<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Developer Lima') }}</title>
    <script>
      (function() {
        const stored = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const dark = stored === 'dark' || (!stored && prefersDark);
        if (dark) document.documentElement.classList.add('dark');
        else document.documentElement.classList.remove('dark');
      })();
    </script>
    @routes
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body>
    <script>
      window.__applyTheme = function(dark) {
        var html = document.documentElement;
        if (dark) {
          html.classList.add('dark');
          try { localStorage.setItem('theme', 'dark'); } catch (e) {}
        } else {
          html.classList.remove('dark');
          try { localStorage.setItem('theme', 'light'); } catch (e) {}
        }
        try { window.dispatchEvent(new CustomEvent('theme-changed', { detail: { dark: dark } })); } catch (e) {}
      };
      window.__getThemeDark = function() {
        return document.documentElement.classList.contains('dark');
      };
    </script>
    @inertia
</body>
</html>
