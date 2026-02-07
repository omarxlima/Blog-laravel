import { ref, onMounted, onUnmounted } from 'vue';

const THEME_KEY = 'theme';

function ensureGlobals() {
  if (typeof window === 'undefined') return;
  if (!window.__applyTheme) {
    window.__applyTheme = function(dark) {
      const html = document.documentElement;
      if (dark) {
        html.classList.add('dark');
        try { localStorage.setItem(THEME_KEY, 'dark'); } catch (_) {}
      } else {
        html.classList.remove('dark');
        try { localStorage.setItem(THEME_KEY, 'light'); } catch (_) {}
      }
      try { window.dispatchEvent(new CustomEvent('theme-changed', { detail: { dark } })); } catch (_) {}
    };
  }
  if (!window.__getThemeDark) {
    window.__getThemeDark = function() {
      return document.documentElement.classList.contains('dark');
    };
  }
}

export function useTheme() {
  const isDark = ref(false);

  function updateFromDOM() {
    ensureGlobals();
    if (typeof window !== 'undefined') {
      isDark.value = window.__getThemeDark();
    }
  }

  function toggle() {
    ensureGlobals();
    if (typeof window !== 'undefined') {
      window.__applyTheme(!window.__getThemeDark());
    }
  }

  function onThemeChanged(e) {
    if (e && e.detail && typeof e.detail.dark !== 'undefined') {
      isDark.value = e.detail.dark;
    } else {
      updateFromDOM();
    }
  }

  onMounted(() => {
    updateFromDOM();
    window.addEventListener('theme-changed', onThemeChanged);
  });

  onUnmounted(() => {
    window.removeEventListener('theme-changed', onThemeChanged);
  });

  return { isDark, toggle };
}
