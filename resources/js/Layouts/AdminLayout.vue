<template>
  <div class="min-h-screen bg-slate-100 dark:bg-slate-900">
    <div class="fixed right-4 top-4 z-[60]">
      <ThemeToggle />
    </div>
    <aside class="fixed inset-y-0 left-0 z-40 w-64 border-r border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800">
      <div class="flex h-16 items-center border-b border-slate-200 px-6 dark:border-slate-700">
        <Link :href="route('dashboard')" class="font-semibold text-slate-800 dark:text-white">Blog Admin</Link>
      </div>
      <nav class="space-y-1 p-4">
        <Link
          :href="route('dashboard')"
          class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium"
          :class="isActive('dashboard') ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700'"
        >
          <span>📊</span> Dashboard
        </Link>
        <div class="pt-2">
          <p class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Conteúdo</p>
          <Link
            :href="route('categoria.index')"
            class="mt-1 flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium"
            :class="isActive('categoria') ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700'"
          >
            <span>📁</span> Categorias
          </Link>
          <Link
            :href="route('categoria.create')"
            class="mt-1 flex items-center gap-3 rounded-lg px-3 py-2 pl-9 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-700"
          >
            Adicionar categoria
          </Link>
          <Link
            :href="route('posts.index')"
            class="mt-1 flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium"
            :class="isActive('posts') ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700'"
          >
            <span>📝</span> Posts
          </Link>
          <Link
            :href="route('posts.create')"
            class="mt-1 flex items-center gap-3 rounded-lg px-3 py-2 pl-9 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-700"
          >
            Adicionar post
          </Link>
        </div>
        <Link
          :href="route('users.index')"
          class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700"
          :class="isActive('users') ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300' : ''"
        >
          <span>👤</span> Usuários
        </Link>
        <div class="border-t border-slate-200 pt-4 dark:border-slate-700">
          <Link
            :href="route('home_page.index')"
            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-700"
          >
            ← Ver site
          </Link>
          <button
            type="button"
            class="mt-1 flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-700"
            @click="logout"
          >
            Sair
          </button>
        </div>
      </nav>
    </aside>
    <div class="pl-64">
      <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-8 dark:border-slate-700 dark:bg-slate-800">
        <h1 class="text-lg font-semibold text-slate-800 dark:text-white">{{ title }}</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400">{{ auth?.user?.name }}</p>
      </header>
      <main class="p-8">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import ThemeToggle from '@/Components/ThemeToggle.vue';

defineProps({ title: { type: String, default: 'Admin' } });

const page = usePage();
const auth = page.props.auth;

function isActive(segment) {
  const url = page.url;
  if (segment === 'dashboard') return url.includes('/dashboard') && !url.includes('posts') && !url.includes('categoria');
  if (segment === 'categoria') return url.includes('categoria');
  if (segment === 'posts') return url.includes('posts');
  if (segment === 'users') return url.includes('users');
  return false;
}

function logout() {
  router.post(route('logout'));
}
</script>
