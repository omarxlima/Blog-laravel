<template>
  <AdminLayout title="Novo post">
    <div class="max-w-4xl">
      <div class="mb-6">
        <Link :href="route('posts.index')" class="text-slate-600 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white">← Voltar</Link>
      </div>
      <form @submit.prevent="submit" class="space-y-6 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
        <div class="grid gap-4 sm:grid-cols-2">
          <div>
            <label for="category_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Categoria</label>
            <select
              id="category_id"
              v-model="form.category_id"
              required
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            >
              <option value="">Selecione a categoria</option>
              <option v-for="c in categorias" :key="c.id" :value="c.id">{{ c.name }}</option>
            </select>
            <p v-if="form.errors.category_id" class="mt-1 text-sm text-red-600">{{ form.errors.category_id }}</p>
          </div>
          <div>
            <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Nome do post</label>
            <input
              id="name"
              v-model="form.name"
              type="text"
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            />
            <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
          </div>
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Descrição / Conteúdo (HTML)</label>
          <textarea
            id="description"
            v-model="form.description"
            rows="12"
            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 font-mono text-sm dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            placeholder="Conteúdo do post. Você pode usar HTML."
          />
          <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">{{ form.errors.description }}</p>
        </div>
        <div>
          <label for="yt_iframe" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Iframe YouTube (opcional)</label>
          <input
            id="yt_iframe"
            v-model="form.yt_iframe"
            type="text"
            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            placeholder="Cole o código embed do vídeo"
          />
        </div>
        <div class="grid gap-4 sm:grid-cols-3">
          <div>
            <label for="meta_title" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Meta título</label>
            <input id="meta_title" v-model="form.meta_title" type="text" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white" />
            <p v-if="form.errors.meta_title" class="mt-1 text-sm text-red-600">{{ form.errors.meta_title }}</p>
          </div>
          <div>
            <label for="meta_description" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Meta descrição</label>
            <input id="meta_description" v-model="form.meta_description" type="text" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white" />
          </div>
          <div>
            <label for="meta_keyword" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Meta palavras-chave</label>
            <input id="meta_keyword" v-model="form.meta_keyword" type="text" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white" />
          </div>
        </div>
        <div class="flex gap-6">
          <label class="flex items-center gap-2">
            <input v-model="form.navbar_status" type="checkbox" class="rounded border-slate-300 text-emerald-600" />
            <span class="text-sm text-slate-700 dark:text-slate-300">Navbar</span>
          </label>
          <label class="flex items-center gap-2">
            <input v-model="form.status" type="checkbox" class="rounded border-slate-300 text-emerald-600" />
            <span class="text-sm text-slate-700 dark:text-slate-300">Publicado</span>
          </label>
        </div>
        <button
          type="submit"
          :disabled="form.processing"
          class="rounded-lg bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700 disabled:opacity-70"
        >
          Salvar
        </button>
      </form>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
  categorias: { type: Array, required: true },
});

const form = useForm({
  category_id: '',
  name: '',
  description: '',
  yt_iframe: '',
  meta_title: '',
  meta_description: '',
  meta_keyword: '',
  navbar_status: false,
  status: false,
});

function submit() {
  form.post(route('posts.store'));
}
</script>
