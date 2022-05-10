<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({professionals: Array});

console.log(props.professionals, props.professionals.length, props.professionals[0].id);


function testeFoo(prof) {
    console.log(prof);
}
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
                        <ul v-if="props.professionals.length > 0" for="professional in async() => await professionals">
                            {{testeFoo()}}
                            <li :key="professional.id">
                                Nome: {{  professional.name }}<br>
                                CRM: {{ professional.crm }}<br>
                            </li>
                        </ul>
                        <div class="p-6 border-b border-gray-300" v-else>
                            Nenhum profissional encontrado
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>