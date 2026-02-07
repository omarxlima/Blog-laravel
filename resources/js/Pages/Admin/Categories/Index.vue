<template>
  <AdminLayout title="Categorias">
    <div v-if="flash?.message" class="mb-4 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">
      {{ flash.message }}
    </div>
    <div class="rounded-xl border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800">
      <div class="flex items-center justify-between border-b border-slate-200 p-4 dark:border-slate-700">
        <h2 class="text-lg font-semibold text-slate-800 dark:text-white">Categorias</h2>
        <Link
          :href="route('categoria.create')"
          class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700"
        >
          Adicionar categoria
        </Link>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
          <thead class="border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800/50">
            <tr>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">#</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Nome</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Imagem</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Status</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Editar</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Excluir</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="cat in categorias" :key="cat.id" class="border-b border-slate-100 dark:border-slate-700">
              <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ cat.id }}</td>
              <td class="px-4 py-3 font-medium text-slate-800 dark:text-white">{{ cat.name }}</td>
              <td class="px-4 py-3">
                <img :src="`/uploads/categoria/${cat.image}`" :alt="cat.name" class="h-12 w-12 rounded-lg object-cover" />
              </td>
              <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ cat.status == 1 ? 'Oculto' : 'Visível' }}</td>
              <td class="px-4 py-3">
                <Link :href="route('categoria.edit', cat.slug)" class="text-amber-600 hover:text-amber-700 dark:text-amber-400">Editar</Link>
              </td>
              <td class="px-4 py-3">
                <button
                  type="button"
                  class="text-red-600 hover:text-red-700 dark:text-red-400"
                  @click="destroy(cat.id)"
                >
                  Excluir
                </button>
              </td>
            </tr>
            <tr v-if="!categorias.length">
              <td colspan="6" class="px-4 py-8 text-center text-slate-500 dark:text-slate-400">Nenhuma categoria encontrada.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
  categorias: { type: Array, required: true },
});

const flash = usePage().props.flash;

function destroy(id) {
  if (confirm('Excluir esta categoria?')) {
    router.delete(route('categoria.destroy', id));
  }
}
</script>
