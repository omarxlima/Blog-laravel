<template>
  <div class="min-h-screen bg-slate-100 dark:bg-slate-900">
    <!-- Barra azul como na página principal -->
    <header class="h-14 bg-[#1A73E8] shadow-md">
      <div class="mx-auto flex h-full max-w-7xl items-center px-4">
        <Link :href="route('home_page.index')" class="flex items-center gap-2 font-bold text-white">
          <span class="flex h-8 w-8 items-center justify-center rounded bg-white/20 text-lg">D</span>
          DeveloperLima
        </Link>
      </div>
    </header>

    <div class="fixed right-4 top-4 z-50">
      <ThemeToggle />
    </div>

    <div class="flex min-h-[calc(100vh-3.5rem)] items-center justify-center px-4 py-8">
      <div class="w-full max-w-md">
        <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-lg dark:border-slate-700 dark:bg-slate-800">
          <Head title="Entrar" />
          <div class="mb-8 text-center">
            <p class="text-lg font-semibold text-slate-800 dark:text-white">Entre na sua conta</p>
          </div>
          <form @submit.prevent="submit" class="space-y-5">
            <div>
              <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">E-mail</label>
              <input
                id="email"
                v-model="form.email"
                type="email"
                autocomplete="email"
                required
                class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-[#1A73E8] focus:outline-none focus:ring-1 focus:ring-[#1A73E8] dark:border-slate-600 dark:bg-slate-700 dark:text-white"
              />
              <p v-if="form.errors.email" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.email }}</p>
            </div>
            <div>
              <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Senha</label>
              <input
                id="password"
                v-model="form.password"
                type="password"
                autocomplete="current-password"
                required
                class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-[#1A73E8] focus:outline-none focus:ring-1 focus:ring-[#1A73E8] dark:border-slate-600 dark:bg-slate-700 dark:text-white"
              />
              <p v-if="form.errors.password" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.password }}</p>
            </div>
            <div class="flex items-center justify-between">
              <label class="flex items-center">
                <input v-model="form.remember" type="checkbox" class="rounded border-slate-300 text-[#1A73E8] focus:ring-[#1A73E8]" />
                <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">Lembrar de mim</span>
              </label>
              <Link v-if="route().has('password.request')" :href="route('password.request')" class="text-sm font-medium text-[#1A73E8] hover:text-[#1557b0] dark:text-blue-400">
                Esqueceu a senha?
              </Link>
            </div>
            <button
              type="submit"
              :disabled="form.processing"
              class="w-full rounded-lg bg-[#1A73E8] px-4 py-2.5 font-medium text-white hover:bg-[#1557b0] focus:outline-none focus:ring-2 focus:ring-[#1A73E8] focus:ring-offset-2 disabled:opacity-70"
            >
              Entrar
            </button>
          </form>
          <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
            Não tem conta?
            <Link :href="route('register')" class="font-medium text-[#1A73E8] hover:text-[#1557b0] dark:text-blue-400">Cadastre-se</Link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import ThemeToggle from '@/Components/ThemeToggle.vue';

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

function submit() {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
}
</script>
