<template>
  <FrontLayout>
    <Head :title="post.meta_title" />
    <div class="flex gap-8">
      <article class="min-w-0 flex-1">
        <header class="mb-6">
          <div
            v-if="post.image"
            class="mb-6 aspect-video w-full overflow-hidden rounded-xl bg-slate-200 dark:bg-slate-700"
          >
            <img
              :src="`/uploads/posts/${post.image}`"
              :alt="post.name"
              class="h-full w-full object-cover"
            />
          </div>
          <h1 class="text-3xl font-bold text-slate-900 dark:text-white">
            {{ post.name }}
          </h1>
          <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
            {{ post.category?.name }}
            <span class="mx-2">·</span>
            {{ formatDate(post.created_at) }}
          </p>
        </header>
        <div
          class="prose prose-slate max-w-none dark:prose-invert prose-headings:font-semibold prose-a:text-emerald-600 dark:prose-a:text-emerald-400"
          v-html="post.description"
        />
      </article>
      <aside class="hidden w-72 shrink-0 space-y-6 lg:block">
        <div class="sticky top-24 rounded-xl border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
          <h3 class="font-semibold text-slate-800 dark:text-white">Postagens recentes</h3>
          <ul class="mt-3 space-y-2">
            <li v-for="p in latestPosts" :key="p.id">
              <Link
                :href="route('home_page.view.post', [p.category?.slug, p.slug])"
                class="text-sm text-slate-600 hover:text-emerald-600 dark:text-slate-400 dark:hover:text-emerald-400"
              >
                {{ p.name }}
              </Link>
            </li>
          </ul>
        </div>
      </aside>
    </div>
  </FrontLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';

defineProps({
  post: { type: Object, required: true },
  latestPosts: { type: Array, default: () => [] },
});

function formatDate(value) {
  if (!value) return '';
  const d = new Date(value);
  return d.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' });
}
</script>
