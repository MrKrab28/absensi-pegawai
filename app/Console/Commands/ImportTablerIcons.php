<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImportTablerIcons extends Command
{
    protected $signature = 'tabler:import-icons {--style=outline}';
    protected $description = 'Import used Tabler icons from Blade + config/menu.php';

    public function handle()
    {
        // ✅ Pastikan style default adalah outline jika tidak diset
        $style = $this->option('style') ?? 'outline';

        if (!in_array($style, ['outline', 'filled'])) {
            $this->error("❌ Style hanya boleh 'outline' atau 'filled'");
            return 1;
        }

        $sourcePath = base_path("node_modules/@tabler/icons/icons/{$style}");
        $destinationPath = $style === 'filled'
            ? resource_path('views/components/icon/filled')
            : resource_path('views/components/icon');

        if (!File::isDirectory($sourcePath)) {
            $this->error("❌ Folder ikon tidak ditemukan: {$sourcePath}");
            return 1;
        }

        File::ensureDirectoryExists($destinationPath);

        // 🔍 Temukan ikon dari file Blade
        $usedIcons = collect(File::allFiles(resource_path('views')))
            ->filter(fn($file) => Str::endsWith($file, '.blade.php'))
            ->flatMap(function ($file) {
                preg_match_all('/<x-icon[^>]*name=[\'\"]([^\'\"]+)[\'\"]/', File::get($file), $matches);
                return $matches[1] ?? [];
            });

        // 🔍 Tambahkan ikon dari file config/menu.php jika ada
        if (file_exists(config_path('menu.php'))) {
            $menuIcons = collect($this->extractIconsFromMenu(config('menu')));
            $usedIcons = $usedIcons->merge($menuIcons);
        }

        $usedIcons = $usedIcons->unique()->values();

        if ($usedIcons->isEmpty()) {
            $this->warn('⚠️ Tidak ada ikon ditemukan di Blade atau config/menu.php');
            return 0;
        }

        $this->info('📦 Menyalin ikon: ' . $usedIcons->implode(', '));
        $copied = 0;

        foreach ($usedIcons as $icon) {
            $sourceFile = "{$sourcePath}/{$icon}.svg";
            $targetFile = "{$destinationPath}/{$icon}.blade.php";

            if (!File::exists($sourceFile)) {
                $this->warn("⚠️ Ikon '{$icon}' tidak ditemukan di style '{$style}'");
                continue;
            }

            $svg = File::get($sourceFile);

            // 🔧 Bersihkan atribut bawaan
            $svg = preg_replace('/fill="[^"]*"/', '', $svg);
            $svg = preg_replace('/stroke="[^"]*"/', '', $svg);
            $svg = preg_replace('/class="[^"]*"/', '', $svg);
            $svg = preg_replace('/<path[^>]*d="M0 0h24v24H0z"[^>]*>/', '', $svg);

            // ✅ Tambahkan class dan atribut dinamis untuk Laravel
            $svg = preg_replace(
                '/<svg([^>]+)>/',
                $style === 'filled'
                    ? '<svg$1 fill="currentColor" stroke="none" {{ $attributes->merge([\'class\' => \'w-6 h-6\']) }}>'
                    : '<svg$1 fill="none" stroke="currentColor" {{ $attributes->merge([\'class\' => \'w-6 h-6\']) }}>',
                $svg
            );

            File::put($targetFile, $svg);
            $copied++;
        }

        $this->info("✅ {$copied} ikon berhasil disalin ke: {$destinationPath}");
        return 0;
    }

    /**
     * Rekursif ambil semua icon dari menu dan submenu
     */
   protected function extractIconsFromMenu(array $menu): array
{
    $icons = [];

    foreach ($menu as $group) {
        if (isset($group['items']) && is_array($group['items'])) {
            foreach ($group['items'] as $item) {
                if (isset($item['icon'])) {
                    $icons[] = $item['icon'];
                }

                if (isset($item['submenu']) && is_array($item['submenu'])) {
                    // Submenu kamu tidak punya icon, jadi tidak perlu ambil icon dari submenu
                    // Tapi kalau ada icon di submenu, bisa juga ambil dengan rekursif
                    foreach ($item['submenu'] as $sub) {
                        if (isset($sub['icon'])) {
                            $icons[] = $sub['icon'];
                        }
                    }
                }
            }
        }
    }

    return $icons;
}

}
