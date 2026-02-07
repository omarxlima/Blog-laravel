<template>
  <div class="flex min-h-screen items-center justify-center bg-slate-100 px-4 dark:bg-slate-900">
    <div class="w-full max-w-md">
      <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-lg dark:border-slate-700 dark:bg-slate-800">
        <Head title="Cadastrar" />
        <div class="mb-8 text-center">
          <Link :href="route('home_page.index')" class="text-2xl font-bold text-slate-800 dark:text-white">DeveloperLima</Link>
          <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Crie sua conta</p>
        </div>
        <form @submit.prevent="submit" class="space-y-5">
          <div>
            <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Nome</label>
            <input
              id="name"
              v-model="form.name"
              type="text"
              autocomplete="name"
              required
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            />
            <p v-if="form.errors.name" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.name }}</p>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">E-mail</label>
            <input
              id="email"
              v-model="form.email"
              type="email"
              autocomplete="email"
              required
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            />
            <p v-if="form.errors.email" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.email }}</p>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Senha</label>
            <input
              id="password"
              v-model="form.password"
              type="password"
              autocomplete="new-password"
              required
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            />
            <p v-if="form.errors.password" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.password }}</p>
          </div>
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Confirmar senha</label>
            <input
              id="password_confirmation"
              v-model="form.password_confirmation"
              type="password"
              autocomplete="new-password"
              required
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white"
            />
          </div>
          <button
            type="submit"
            :disabled="form.processing"
            class="w-full rounded-lg bg-emerald-600 px-4 py-2.5 font-medium text-white hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 disabled:opacity-70"
          >
            Cadastrar
          </button>
        </form>
        <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
          Já tem conta?
          <Link :href="route('login')" class="font-medium text-emerald-600 hover:text-emerald-700 dark:text-emerald-400">Entrar</Link>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

function submit() {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
}
</script>
