<template>
  <div class="min-h-screen bg-white dark:bg-slate-900">
    <!-- Header azul estilo TecMundo -->
    <header class="sticky top-0 z-50 bg-[#1A73E8] shadow-md">
      <div class="mx-auto flex h-14 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4">
          <button
            type="button"
            class="rounded p-1.5 text-white hover:bg-white/10 lg:hidden"
            aria-label="Menu"
            @click="menuOpen = !menuOpen"
          >
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/></svg>
          </button>
          <Link :href="route('home_page.index')" class="flex items-center gap-2 font-bold text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded bg-white/20 text-lg">D</span>
            DeveloperLima
          </Link>
        </div>

        <div class="hidden flex-1 max-w-xl px-4 lg:block">
          <div class="relative">
            <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input
              type="search"
              placeholder="Busque por notícias, tutoriais, tecnologia..."
              class="w-full rounded-lg border-0 bg-white/95 py-2.5 pl-10 pr-4 text-slate-800 placeholder-slate-500 focus:ring-2 focus:ring-white"
            />
          </div>
        </div>

        <div class="flex items-center gap-2">
          <a href="#" class="rounded p-2 text-white hover:bg-white/10" aria-label="Facebook"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
          <a href="#" class="rounded p-2 text-white hover:bg-white/10" aria-label="Instagram"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
          <a href="#" class="rounded p-2 text-white hover:bg-white/10" aria-label="YouTube"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
          <a href="#" class="rounded p-2 text-white hover:bg-white/10" aria-label="LinkedIn"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>

          <div class="ml-2 hidden border-l border-white/30 pl-2 sm:flex sm:gap-2">
            <Link v-if="auth.user" :href="route('dashboard')" class="rounded px-3 py-1.5 text-sm font-medium text-white hover:bg-white/10">Dashboard</Link>
            <template v-if="auth.user">
              <button type="button" class="rounded px-3 py-1.5 text-sm font-medium text-white hover:bg-white/10" @click="logout">Sair</button>
            </template>
            <template v-else>
              <Link :href="route('login')" class="rounded px-3 py-1.5 text-sm font-medium text-white hover:bg-white/10">Entrar</Link>
              <Link :href="route('register')" class="rounded bg-white px-3 py-1.5 text-sm font-medium text-[#1A73E8] hover:bg-white/90">Cadastrar</Link>
            </template>
          </div>
        </div>
      </div>

      <!-- Menu mobile / categorias -->
      <div v-show="menuOpen" class="border-t border-white/20 bg-[#1557b0] px-4 py-3 lg:hidden">
        <div class="flex flex-col gap-2">
          <Link v-for="cat in categoriesNav" :key="cat.id" :href="route('home_page.view', cat.slug)" class="rounded px-3 py-2 text-white hover:bg-white/10">{{ cat.name }}</Link>
          <Link :href="route('home_page.index')" class="rounded px-3 py-2 text-white hover:bg-white/10">Home</Link>
        </div>
      </div>

      <!-- Nav categorias (desktop) -->
      <nav class="hidden border-t border-white/20 bg-[#1557b0] lg:block">
        <div class="mx-auto flex max-w-7xl gap-1 px-4 py-2 sm:px-6 lg:px-8">
          <Link :href="route('home_page.index')" class="rounded px-3 py-1.5 text-sm font-medium text-white hover:bg-white/10" :class="{ 'bg-white/20': page.url === '/' }">Home</Link>
          <Link v-for="cat in categoriesNav" :key="cat.id" :href="route('home_page.view', cat.slug)" class="rounded px-3 py-1.5 text-sm font-medium text-white hover:bg-white/10">{{ cat.name }}</Link>
        </div>
      </nav>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <slot />
    </main>

    <footer class="border-t border-slate-200 bg-slate-50 py-8 dark:border-slate-700 dark:bg-slate-800">
      <div class="mx-auto max-w-7xl px-4 text-center text-sm text-slate-500 dark:text-slate-400">
        © {{ new Date().getFullYear() }} Developer Lima. Tutoriais e artigos de tecnologia.
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const { auth, categoriesNav } = page.props;
const menuOpen = ref(false);

function logout() {
  router.post(route('logout'));
}
</script>
