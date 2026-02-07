<template>
  <AdminLayout title="Dashboard">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <div class="rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Categorias</p>
        <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">{{ stats.categories }}</p>
        <Link :href="route('categoria.index')" class="mt-2 inline-block text-sm font-medium text-emerald-600 hover:text-emerald-700 dark:text-emerald-400">Ver todas →</Link>
      </div>
      <div class="rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Posts</p>
        <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">{{ stats.posts }}</p>
        <Link :href="route('posts.index')" class="mt-2 inline-block text-sm font-medium text-emerald-600 hover:text-emerald-700 dark:text-emerald-400">Ver todos →</Link>
      </div>
      <div class="rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Usuários</p>
        <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">{{ stats.users }}</p>
        <Link :href="route('users.index')" class="mt-2 inline-block text-sm font-medium text-emerald-600 hover:text-emerald-700 dark:text-emerald-400">Ver todos →</Link>
      </div>
      <div class="rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Ações rápidas</p>
        <div class="mt-3 flex flex-wrap gap-2">
          <Link :href="route('categoria.create')" class="rounded-lg bg-slate-200 px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-300 dark:bg-slate-600 dark:text-white dark:hover:bg-slate-500">Nova categoria</Link>
          <Link :href="route('posts.create')" class="rounded-lg bg-emerald-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-emerald-700">Novo post</Link>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
  stats: {
    type: Object,
    default: () => ({ categories: 0, posts: 0, users: 0 }),
  },
});
</script>
