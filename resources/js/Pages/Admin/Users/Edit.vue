<template>
  <AdminLayout title="Editar usuário">
    <div class="max-w-xl">
      <div class="mb-6">
        <Link :href="route('users.index')" class="text-slate-600 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white">← Voltar</Link>
      </div>
      <div v-if="flash?.message" class="mb-4 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">
        {{ flash.message }}
      </div>
      <form @submit.prevent="submit" class="space-y-6 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-800">
        <div>
          <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">Nome</label>
          <p class="mt-1 text-slate-800 dark:text-white">{{ usuario.name }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">E-mail</label>
          <p class="mt-1 text-slate-800 dark:text-white">{{ usuario.email }}</p>
        </div>
        <div>
          <label for="acesso" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Acesso / Perfil</label>
          <select
            id="acesso"
            v-model="form.acesso"
            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
          >
            <option value="0">Usuário</option>
            <option value="1">Admin</option>
            <option value="2">Blogger</option>
          </select>
          <p v-if="form.errors.acesso" class="mt-1 text-sm text-red-600">{{ form.errors.acesso }}</p>
        </div>
        <button
          type="submit"
          :disabled="form.processing"
          class="rounded-lg bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700 disabled:opacity-70"
        >
          Atualizar
        </button>
      </form>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
  usuario: { type: Object, required: true },
});

const flash = usePage().props.flash;

const form = useForm({
  acesso: String(props.usuario.role_as ?? 0),
});

function submit() {
  form.put(route('users.update', props.usuario.id));
}
</script>
