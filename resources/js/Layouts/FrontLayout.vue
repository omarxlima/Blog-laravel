<template>
  <div class="min-h-screen bg-slate-50 dark:bg-slate-900">
    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur dark:border-slate-700 dark:bg-slate-900/90">
      <nav class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <Link :href="route('home_page.index')" class="flex items-center gap-2 font-semibold text-slate-800 dark:text-white">
          <span class="text-xl">◉</span>
          DeveloperLima
        </Link>
        <div class="flex items-center gap-6">
          <Link
            :href="route('home_page.index')"
            class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400"
            :class="{ 'text-emerald-600 dark:text-emerald-400': page.url === '/' }"
          >
            Home
          </Link>
          <Link
            v-for="cat in categoriesNav"
            :key="cat.id"
            :href="route('home_page.view', cat.slug)"
            class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400"
          >
            {{ cat.name }}
          </Link>
          <template v-if="auth.user">
            <Link
              :href="route('dashboard')"
              class="rounded-lg bg-emerald-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-emerald-700"
            >
              Dashboard
            </Link>
            <button
              type="button"
              class="text-sm font-medium text-slate-600 hover:text-slate-900 dark:text-slate-300 dark:hover:text-white"
              @click="logout"
            >
              Sair
            </button>
          </template>
          <template v-else>
            <Link
              :href="route('login')"
              class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300"
            >
              Entrar
            </Link>
            <Link
              :href="route('register')"
              class="rounded-lg bg-slate-800 px-3 py-1.5 text-sm font-medium text-white hover:bg-slate-700 dark:bg-slate-700 dark:hover:bg-slate-600"
            >
              Cadastrar
            </Link>
          </template>
        </div>
      </nav>
    </header>
    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
      <slot />
    </main>
    <footer class="border-t border-slate-200 bg-white py-8 dark:border-slate-700 dark:bg-slate-900">
      <div class="mx-auto max-w-6xl px-4 text-center text-sm text-slate-500 dark:text-slate-400">
        © {{ new Date().getFullYear() }} Developer Lima. Tutoriais e artigos de tecnologia.
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';

const page = usePage();
const { auth, categoriesNav } = page.props;

function logout() {
  router.post(route('logout'));
}
</script>
