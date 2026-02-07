<template>
  <AdminLayout title="Editar categoria">
    <div class="max-w-2xl">
      <div class="mb-6 flex items-center gap-4">
        <Link :href="route('categoria.index')" class="text-slate-600 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white">← Voltar</Link>
      </div>
      <form @submit.prevent="submit" class="space-y-6 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
        <div>
          <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Nome da categoria</label>
          <input
            id="name"
            v-model="form.name"
            type="text"
            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
          />
          <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
        </div>
        <div>
          <label for="image" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Imagem (deixe em branco para manter)</label>
          <div class="mt-1 flex items-center gap-4">
            <img v-if="categoria.image" :src="`/uploads/categoria/${categoria.image}`" :alt="categoria.name" class="h-16 w-16 rounded-lg object-cover" />
            <input
              id="image"
              type="file"
              accept="image/jpeg,image/jpg,image/png"
              class="block text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:px-4 file:py-2 file:text-emerald-700 dark:file:bg-emerald-900/30 dark:file:text-emerald-300"
              @change="form.image = $event.target.files[0]"
            />
          </div>
          <p v-if="form.errors.image" class="mt-1 text-sm text-red-600">{{ form.errors.image }}</p>
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Descrição</label>
          <textarea
            id="description"
            v-model="form.description"
            rows="3"
            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
          />
          <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">{{ form.errors.description }}</p>
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
            <p v-if="form.errors.meta_description" class="mt-1 text-sm text-red-600">{{ form.errors.meta_description }}</p>
          </div>
          <div>
            <label for="meta_keyword" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Meta palavras-chave</label>
            <input id="meta_keyword" v-model="form.meta_keyword" type="text" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white" />
            <p v-if="form.errors.meta_keyword" class="mt-1 text-sm text-red-600">{{ form.errors.meta_keyword }}</p>
          </div>
        </div>
        <div class="flex gap-6">
          <label class="flex items-center gap-2">
            <input v-model="form.navbar_status" type="checkbox" true-value="1" false-value="0" class="rounded border-slate-300 text-emerald-600" />
            <span class="text-sm text-slate-700 dark:text-slate-300">Exibir na navbar</span>
          </label>
          <label class="flex items-center gap-2">
            <input v-model="form.status" type="checkbox" true-value="1" false-value="0" class="rounded border-slate-300 text-emerald-600" />
            <span class="text-sm text-slate-700 dark:text-slate-300">Ativo (visível)</span>
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

const props = defineProps({
  categoria: { type: Object, required: true },
});

const form = useForm({
  name: props.categoria.name,
  description: props.categoria.description ?? '',
  image: null,
  meta_title: props.categoria.meta_title ?? '',
  meta_description: props.categoria.meta_description ?? '',
  meta_keyword: props.categoria.meta_keyword ?? '',
  navbar_status: props.categoria.navbar_status ?? '0',
  status: props.categoria.status ?? '0',
});

function submit() {
  form.post(route('categoria.update', props.categoria.slug), {
    _method: 'put',
    forceFormData: true,
  });
}
</script>
