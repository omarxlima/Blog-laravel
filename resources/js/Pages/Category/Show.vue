<template>
  <FrontLayout>
    <Head :title="category.meta_title" />
    <div class="flex gap-8">
      <div class="min-w-0 flex-1">
        <h1 class="mb-6 text-3xl font-bold text-slate-900 dark:text-white">
          {{ category.name }}
        </h1>
        <div v-if="post.data.length === 0" class="rounded-xl border border-slate-200 bg-white p-8 text-center dark:border-slate-700 dark:bg-slate-800">
          <p class="text-slate-500 dark:text-slate-400">Nenhuma postagem disponível nesta categoria.</p>
        </div>
        <div v-else class="space-y-6">
          <article
            v-for="item in post.data"
            :key="item.id"
            class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md dark:border-slate-700 dark:bg-slate-800"
          >
            <Link :href="route('home_page.view.post', [category.slug, item.slug])" class="block">
              <h2 class="text-xl font-semibold text-slate-800 hover:text-emerald-600 dark:text-white dark:hover:text-emerald-400">
                {{ item.name }}
              </h2>
              <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                Postado em {{ formatDate(item.created_at) }}
                <span class="mx-2">·</span>
                Por {{ item.user?.name }}
              </p>
            </Link>
          </article>
        </div>
        <div v-if="post.next_page_url" class="mt-8 flex justify-center gap-2">
          <Link
            v-for="(link, i) in post.links.filter(l => l.url)"
            :key="i"
            :href="link.url"
            class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium dark:border-slate-600"
            :class="link.active ? 'bg-emerald-600 text-white border-emerald-600' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700'"
            v-html="link.label"
          />
        </div>
      </div>
      <aside class="hidden w-72 shrink-0 lg:block">
        <div class="sticky top-24 rounded-xl border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
          <h3 class="font-semibold text-slate-800 dark:text-white">Categoria</h3>
          <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ category.name }}</p>
        </div>
      </aside>
    </div>
  </FrontLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';

const props = defineProps({
  category: { type: Object, required: true },
  post: { type: Object, required: true },
});

function formatDate(value) {
  if (!value) return '';
  const d = new Date(value);
  return d.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' });
}
</script>
