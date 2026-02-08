<template>
  <AdminLayout title="Categorias">
    <div v-if="flash?.message" class="mb-4 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">
      {{ flash.message }}
    </div>
    <div v-if="flash?.error" class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-red-900/30 dark:text-red-300">
      {{ flash.error }}
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
                  @click="openConfirm(cat)"
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

    <!-- Modal de confirmação de exclusão -->
    <Teleport to="body">
      <div
        v-show="confirmOpen"
        class="fixed inset-0 z-[100] flex items-center justify-center p-4"
        role="dialog"
        aria-modal="true"
        aria-labelledby="confirm-title"
      >
        <div class="fixed inset-0 bg-black/50 transition-opacity" aria-hidden="true" @click="closeConfirm" />
        <div
          class="relative w-full max-w-md rounded-xl border border-slate-200 bg-white p-6 shadow-xl dark:border-slate-700 dark:bg-slate-800"
          @click.stop
        >
          <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">
              <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
            </div>
            <div class="min-w-0 flex-1">
              <h3 id="confirm-title" class="text-lg font-semibold text-slate-900 dark:text-white">
                Excluir categoria?
              </h3>
              <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
                A categoria <strong class="text-slate-800 dark:text-slate-200">"{{ categoryToDelete?.name }}"</strong> será excluída.
                Esta ação usa exclusão lógica (soft delete) e pode ser revertida pelo administrador se necessário.
              </p>
              <p class="mt-2 text-xs text-slate-500 dark:text-slate-500">
                Se houver postagens vinculadas a esta categoria, a exclusão não será permitida.
              </p>
              <div class="mt-6 flex flex-wrap gap-3">
                <button
                  type="button"
                  class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-200 dark:hover:bg-slate-600"
                  @click="closeConfirm"
                >
                  Cancelar
                </button>
                <button
                  type="button"
                  class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 disabled:opacity-50"
                  :disabled="confirmLoading"
                  @click="confirmDestroy"
                >
                  {{ confirmLoading ? 'Excluindo...' : 'Excluir' }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Teleport>
  </AdminLayout>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
  categorias: { type: Array, required: true },
});

const flash = usePage().props.flash;
const confirmOpen = ref(false);
const confirmLoading = ref(false);
const categoryToDelete = ref(null);

function openConfirm(cat) {
  categoryToDelete.value = { id: cat.id, name: cat.name };
  confirmOpen.value = true;
}

function closeConfirm() {
  if (!confirmLoading.value) {
    confirmOpen.value = false;
    categoryToDelete.value = null;
  }
}

function confirmDestroy() {
  if (!categoryToDelete.value) return;
  confirmLoading.value = true;
  router.delete(route('categoria.destroy', categoryToDelete.value.id), {
    onFinish: () => {
      confirmLoading.value = false;
      closeConfirm();
    },
  });
}
</script>
