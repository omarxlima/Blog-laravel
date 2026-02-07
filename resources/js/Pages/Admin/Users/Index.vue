<template>
  <AdminLayout title="Usuários">
    <div v-if="flash?.message" class="mb-4 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">
      {{ flash.message }}
    </div>
    <div class="rounded-xl border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800">
      <div class="border-b border-slate-200 p-4 dark:border-slate-700">
        <h2 class="text-lg font-semibold text-slate-800 dark:text-white">Usuários</h2>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
          <thead class="border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800/50">
            <tr>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">#</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Nome</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">E-mail</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Criação</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Perfil</th>
              <th class="px-4 py-3 font-medium text-slate-700 dark:text-slate-300">Editar</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="u in usuarios" :key="u.id" class="border-b border-slate-100 dark:border-slate-700">
              <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ u.id }}</td>
              <td class="px-4 py-3 font-medium text-slate-800 dark:text-white">{{ u.name }}</td>
              <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ u.email }}</td>
              <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ formatDate(u.created_at) }}</td>
              <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ roleLabel(u.role_as) }}</td>
              <td class="px-4 py-3">
                <Link :href="route('users.edit', u.id)" class="text-amber-600 hover:text-amber-700 dark:text-amber-400">Editar</Link>
              </td>
            </tr>
            <tr v-if="!usuarios.length">
              <td colspan="6" class="px-4 py-8 text-center text-slate-500 dark:text-slate-400">Nenhum usuário cadastrado.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
  usuarios: { type: Array, required: true },
});

const flash = usePage().props.flash;

function formatDate(value) {
  if (!value) return '';
  return new Date(value).toLocaleDateString('pt-BR');
}

function roleLabel(role) {
  const map = { 0: 'Usuário', 1: 'Admin', 2: 'Blogger' };
  return map[role] ?? 'Usuário';
}
</script>
