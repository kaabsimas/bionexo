<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import ProfessionalForm from '@/Components/ProfessionalForm.vue';
import {reactive} from 'vue';

const form = reactive({});

async function submit() {
    fetch(
        route('professional.store'), 
        {
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        }
    ).then(async response => {
        console.log(await response.json());
    });
}
</script>
<template>
    <Head title="Novo Médico" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Novo Médico > Novo
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="post" :action="route('professional.store')" @submit.prevent="submit">
                            <ProfessionalForm v-model="form" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>