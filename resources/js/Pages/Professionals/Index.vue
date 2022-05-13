<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from '@/Components/Button.vue';
import ProfessionalItem from '@/Components/ProfessionalItem.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { watch } from '@vue/runtime-core';

const props = defineProps({professionals: Array});
</script>
<template>
    <Head title="Médicos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Medicos
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Button type="button">
                            <a :href="route('professional.create')">Novo Médico</a>
                        </Button>
                        <br>
                        <br>
                        <template v-if="professionals.length > 0 && professionals.every(i => !! i)">
                            <ul >
                                <li v-for="professional in professionals" :key="professional.id" class="p-6">
                                    <ProfessionalItem :professional="professional" />
                                </li>
                            </ul>
                        </template>
                        <div class="p-6 border border-gray-300" v-else>
                            Nenhum profissional encontrado
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>