<template>
  <FrontLayout>
    <Head title="Developer Lima - Tutoriais de Tecnologia" />

    <!-- Título Blog + tagline -->
    <section class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
      <h1 class="text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">Blog</h1>
      <p class="max-w-xl text-sm text-slate-600 dark:text-slate-400">
        {{ tagline }}
      </p>
    </section>

    <!-- Destaques: 3 cards em grid -->
    <section class="mb-10 grid gap-6 sm:grid-cols-3">
      <Link
        v-for="post in featuredPosts"
        :key="post.id"
        :href="postLink(post)"
        class="group relative block overflow-hidden rounded-lg bg-slate-200 dark:bg-slate-700"
      >
        <div class="aspect-[4/3] w-full overflow-hidden">
          <img
            :src="postImage(post)"
            :alt="post.name"
            class="h-full w-full object-cover transition group-hover:scale-105"
          />
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent" />
        <div class="absolute bottom-0 left-0 right-0 p-4">
          <span class="mb-2 inline-flex items-center gap-1.5 rounded bg-white/20 px-2 py-0.5 text-xs font-medium text-white">■ BLOG</span>
          <h2 class="text-lg font-bold leading-tight text-white line-clamp-2 group-hover:underline">
            {{ post.name }}
          </h2>
        </div>
      </Link>
    </section>

    <!-- Últimas notícias | Mais lidas -->
    <div class="grid gap-8 lg:grid-cols-[1fr_320px]">
      <!-- Últimas notícias -->
      <section>
        <h2 class="mb-4 flex items-center gap-2 text-xl font-bold text-slate-900 dark:text-white">
          <svg class="h-5 w-5 text-slate-500" fill="currentColor" viewBox="0 0 24 24"><path d="M6.503 20.752c0 1.794-1.456 3.248-3.251 3.248-1.796 0-3.252-1.454-3.252-3.248 0-1.794 1.456-3.248 3.252-3.248 1.795.001 3.251 1.454 3.251 3.248zm-6.503-12.572v4.811c0 2.653 2.229 4.806 4.972 4.806.547 0 1.083-.093 1.599-.272l1.286 1.286c-1.644.961-3.5 1.458-5.398 1.458-4.101 0-7.459-3.258-7.459-7.27V8.18H0V3.57h6.503v4.61h.001zm14.496 4.811c0 2.653 2.229 4.806 4.972 4.806.547 0 1.083-.093 1.599-.272l1.286 1.286c-1.644.961-3.5 1.458-5.398 1.458-4.101 0-7.459-3.258-7.459-7.27V8.18h-6.503V3.57h6.503v4.61h6.503v4.812h-.001z"/></svg>
          Últimas notícias
        </h2>
        <ul class="space-y-4">
          <li v-for="post in latestPosts" :key="post.id">
            <Link :href="postLink(post)" class="flex gap-4 rounded-lg p-2 transition hover:bg-slate-100 dark:hover:bg-slate-800">
              <div class="h-20 w-24 shrink-0 overflow-hidden rounded-lg bg-slate-200 dark:bg-slate-700">
                <img :src="postImage(post)" :alt="post.name" class="h-full w-full object-cover" />
              </div>
              <div class="min-w-0 flex-1">
                <h3 class="font-semibold text-slate-900 dark:text-white line-clamp-2 hover:text-[#1A73E8] dark:hover:text-blue-400">
                  {{ post.name }}
                </h3>
                <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">{{ timeAgo(post.created_at) }}</p>
              </div>
            </Link>
          </li>
          <li v-if="!latestPosts.length" class="rounded-lg border border-dashed border-slate-300 p-6 text-center text-slate-500 dark:border-slate-600 dark:text-slate-400">
            Nenhuma notícia recente.
          </li>
        </ul>
      </section>

      <!-- Mais lidas (sidebar azul) -->
      <aside class="lg:order-none">
        <div class="rounded-lg bg-[#1A73E8] p-5 text-white shadow-lg">
          <h2 class="mb-4 flex items-center gap-2 text-lg font-bold">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            Mais lidas
          </h2>
          <ol class="space-y-3">
            <li v-for="(post, index) in mostReadPosts" :key="post.id">
              <Link :href="postLink(post)" class="flex gap-3 rounded py-1 hover:bg-white/10">
                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20 text-sm font-bold">{{ index + 1 }}</span>
                <span class="line-clamp-2 text-sm font-medium hover:underline">{{ post.name }}</span>
              </Link>
            </li>
            <li v-if="!mostReadPosts.length" class="text-sm text-white/80">Nenhuma postagem ainda.</li>
          </ol>
        </div>
      </aside>
    </div>

    <!-- Categorias (opcional, em grid compacto) -->
    <section class="mt-12 border-t border-slate-200 pt-10 dark:border-slate-700">
      <h2 class="mb-4 text-xl font-bold text-slate-900 dark:text-white">Categorias</h2>
      <div class="flex flex-wrap gap-3">
        <Link
          v-for="cat in categoriasHome"
          :key="cat.id"
          :href="route('home_page.view', cat.slug)"
          class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:border-[#1A73E8] hover:text-[#1A73E8] dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-400 dark:hover:text-blue-400"
        >
          {{ cat.name }}
        </Link>
      </div>
    </section>

    <!-- Publicidade (placeholder) -->
    <section class="mt-12 rounded-lg border border-slate-200 bg-slate-100 py-8 dark:border-slate-700 dark:bg-slate-800">
      <p class="text-center text-sm font-medium text-slate-500 dark:text-slate-400">Publicidade</p>
      <div class="mx-auto mt-2 flex max-w-md items-center justify-center gap-4 rounded-lg bg-white p-6 dark:bg-slate-700">
        <div class="h-16 w-16 rounded-lg bg-slate-200 dark:bg-slate-600" />
        <div class="text-center text-sm text-slate-600 dark:text-slate-400">
          <p>Espaço para anúncio</p>
          <p class="mt-1 text-xs">Developer Lima</p>
        </div>
      </div>
    </section>
  </FrontLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';

const props = defineProps({
  categoriasHome: { type: Array, default: () => [] },
  featuredPosts: { type: Array, default: () => [] },
  latestPosts: { type: Array, default: () => [] },
  mostReadPosts: { type: Array, default: () => [] },
});

const tagline = props.featuredPosts.length
  ? `${props.featuredPosts[0].name} - ${(props.featuredPosts[0].meta_description || '').slice(0, 60)}...`
  : 'Tutoriais e artigos de tecnologia. Desenvolvimento, ferramentas e boas práticas.';

function postLink(post) {
  const cat = post.category;
  if (!cat) return route('home_page.index');
  return route('home_page.view.post', [cat.slug, post.slug]);
}

const PLACEHOLDER_IMAGE = 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop';

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

function timeAgo(value) {
  if (!value) return '';
  const d = new Date(value);
  const now = new Date();
  const diffMs = now - d;
  const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
  if (diffDays === 0) return 'Hoje';
  if (diffDays === 1) return 'Ontem';
  if (diffDays < 7) return `Há ${diffDays} dias`;
  if (diffDays < 30) return `Há ${Math.floor(diffDays / 7)} semana(s)`;
  if (diffDays < 365) return `Há ${Math.floor(diffDays / 30)} mês(es)`;
  return `Há ${Math.floor(diffDays / 365)} ano(s)`;
}
</script>
