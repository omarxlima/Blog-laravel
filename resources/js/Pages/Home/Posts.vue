<template>
  <FrontLayout>
    <Head title="Todas as postagens - Developer Lima" />

    <div class="mb-8">
      <h1 class="text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">Todas as postagens</h1>
      <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
        Confira todos os tutoriais e artigos publicados no blog.
      </p>
    </div>

    <div v-if="!posts.data.length" class="rounded-xl border border-slate-200 bg-white p-12 text-center dark:border-slate-700 dark:bg-slate-800">
      <p class="text-slate-500 dark:text-slate-400">Nenhuma postagem disponível.</p>
      <Link :href="route('home_page.index')" class="mt-4 inline-block text-emerald-600 hover:underline dark:text-emerald-400">Voltar ao início</Link>
    </div>

    <ul v-else class="space-y-6">
      <li v-for="post in posts.data" :key="post.id">
        <Link
          :href="postLink(post)"
          class="flex gap-4 rounded-xl border border-slate-200 bg-white p-4 transition hover:border-[#1A73E8] hover:shadow-md dark:border-slate-700 dark:bg-slate-800 dark:hover:border-blue-400"
        >
          <div class="h-28 w-40 shrink-0 overflow-hidden rounded-lg bg-slate-200 dark:bg-slate-700">
            <img :src="postImage(post)" :alt="post.name" class="h-full w-full object-cover" />
          </div>
          <div class="min-w-0 flex-1">
            <span v-if="post.category" class="text-xs font-medium text-[#1A73E8] dark:text-blue-400">{{ post.category.name }}</span>
            <h2 class="mt-1 text-lg font-semibold text-slate-900 dark:text-white line-clamp-2 hover:underline">
              {{ post.name }}
            </h2>
            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
              {{ formatDate(post.created_at) }}
              <span v-if="post.user" class="mx-2">·</span>
              <span v-if="post.user">{{ post.user.name }}</span>
            </p>
          </div>
        </Link>
      </li>
    </ul>

    <!-- Paginação -->
    <div v-if="posts.links && posts.links.length > 1" class="mt-10 flex flex-wrap justify-center gap-2">
      <Link
        v-for="(link, i) in posts.links.filter(l => l.url)"
        :key="i"
        :href="link.url"
        class="rounded-lg border px-4 py-2 text-sm font-medium transition"
        :class="link.active
          ? 'border-[#1A73E8] bg-[#1A73E8] text-white dark:border-blue-500 dark:bg-blue-500'
          : 'border-slate-300 text-slate-700 hover:bg-slate-100 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-700'"
        v-html="link.label"
      />
    </div>
  </FrontLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';

defineProps({
  posts: { type: Object, required: true },
});

const PLACEHOLDER_IMAGE = 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop';

function postLink(post) {
  const cat = post.category;
  if (!cat) return route('home_page.index');
  return route('home_page.view.post', [cat.slug, post.slug]);
}

function postImage(post) {
  const postImg = post?.image;
  if (postImg && String(postImg).trim()) {
    const path = String(postImg).startsWith('uploads/') ? postImg : `uploads/posts/${postImg}`;
    return path.startsWith('/') ? path : `/${path}`;
  }
  const categoryImg = post?.category?.image;
  if (categoryImg && String(categoryImg).trim()) {
    const path = String(categoryImg).startsWith('uploads/') ? categoryImg : `uploads/categoria/${categoryImg}`;
    return path.startsWith('/') ? path : `/${path}`;
  }
  return PLACEHOLDER_IMAGE;
}

function formatDate(value) {
  if (!value) return '';
  const d = new Date(value);
  return d.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' });
}
</script>
