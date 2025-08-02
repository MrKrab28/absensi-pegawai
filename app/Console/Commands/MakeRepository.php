<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Buat file Repository dan Service berdasarkan nama model';

    public function handle()
    {
        $name = $this->argument('name');
        $repositoryPath = app_path("Http/Repositories/{$name}Repository.php");
        $servicePath = app_path("Http/Services/{$name}Service.php");

        // Buat folder jika belum ada
        if (!File::exists(app_path('Http/Repositories'))) {
            File::makeDirectory(app_path('Http/Repositories'), 0755, true);
        }

        if (!File::exists(app_path('Http/Services'))) {
            File::makeDirectory(app_path('Http/Services'), 0755, true);
        }

        // Buat file Repository
        if (!File::exists($repositoryPath)) {
            File::put($repositoryPath, $this->getRepositoryContent($name));
            $this->info("Repository {$name}Repository dibuat");
        } else {
            $this->warn("Repository {$name}Repository sudah ada");
        }

        // Buat file Service
        if (!File::exists($servicePath)) {
            File::put($servicePath, $this->getServiceContent($name));
            $this->info("Service {$name}Service dibuat");
        } else {
            $this->warn("Service {$name}Service sudah ada");
        }
    }

    protected function getRepositoryContent($name)
    {
        return <<<PHP
<?php

namespace App\Repositories;

use App\Models\\{$name};

class {$name}Repository
{
    public function getAll()
    {
        return {$name}::all();
    }

    public function find(\$id)
    {
        return {$name}::findOrFail(\$id);
    }

    public function create(array \$data)
    {
        return {$name}::create(\$data);
    }

    public function update(\$id, array \$data)
    {
        \$item = {$name}::findOrFail(\$id);
        \$item->update(\$data);
        return \$item;
    }

    public function delete(\$id)
    {
        return {$name}::destroy(\$id);
    }
}
PHP;
    }

    protected function getServiceContent($name)
    {
        return <<<PHP
<?php

namespace App\Services;

use App\Repositories\\{$name}Repository;

class {$name}Service
{
    protected \${$name}Repository;

    public function __construct({$name}Repository \${$name}Repository)
    {
        \$this->{$name}Repository = \${$name}Repository;
    }

    public function getAll()
    {
        return \$this->{$name}Repository->getAll();
    }

    public function find(\$id)
    {
        return \$this->{$name}Repository->find(\$id);
    }

    public function create(array \$data)
    {
        return \$this->{$name}Repository->create(\$data);
    }

    public function update(\$id, array \$data)
    {
        return \$this->{$name}Repository->update(\$id, \$data);
    }

    public function delete(\$id)
    {
        return \$this->{$name}Repository->delete(\$id);
    }
}
PHP;
    }
}
