import SimpleBar from 'simplebar';
import ResizeObserver from 'resize-observer-polyfill';

window.ResizeObserver = ResizeObserver;

document.addEventListener('DOMContentLoaded', () => {
  console.log('🔧 SimpleBar init...');

  document.querySelectorAll('[data-simplebar]').forEach((el) => {
    console.log('📦 Init SimpleBar untuk:', el);
    new SimpleBar(el);
  });
});
