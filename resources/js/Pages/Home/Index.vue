<template>
  <FrontLayout>
    <Head title="Developer Lima - Tutoriais de Tecnologia" />
    <div class="space-y-12">
      <section class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-5xl">
          Tutoriais e artigos de tecnologia
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-600 dark:text-slate-400">
          Desenvolvimento, ferramentas e boas práticas para devs.
        </p>
      </section>

      <section>
        <h2 class="mb-6 text-xl font-semibold text-slate-800 dark:text-white">Categorias</h2>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
          <Link
            v-for="cat in categoriasHome"
            :key="cat.id"
            :href="route('home_page.view', cat.slug)"
            class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:border-emerald-300 hover:shadow-md dark:border-slate-700 dark:bg-slate-800 dark:hover:border-emerald-600"
          >
            <div class="aspect-video overflow-hidden bg-slate-100 dark:bg-slate-700">
              <img
                :src="`/uploads/categoria/${cat.image}`"
                :alt="cat.name"
                class="h-full w-full object-cover transition group-hover:scale-105"
              />
            </div>
            <div class="p-4">
              <h3 class="font-semibold text-slate-800 group-hover:text-emerald-600 dark:text-white dark:group-hover:text-emerald-400">
                {{ cat.name }}
              </h3>
              <p v-if="cat.description" class="mt-1 line-clamp-2 text-sm text-slate-500 dark:text-slate-400">
                {{ cat.description }}
              </p>
            </div>
          </Link>
        </div>
      </section>

      <section class="rounded-2xl border border-slate-200 bg-slate-100/50 p-8 dark:border-slate-700 dark:bg-slate-800/50">
        <h2 class="mb-4 text-lg font-semibold text-slate-800 dark:text-white">Sobre o blog</h2>
        <p class="text-slate-600 dark:text-slate-400">
          Conteúdo prático sobre programação, Laravel, Vue, ferramentas e dicas para o dia a dia de desenvolvimento.
        </p>
      </section>
    </div>
  </FrontLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';

defineProps({
  categoriasHome: { type: Array, required: true },
});
</script>
