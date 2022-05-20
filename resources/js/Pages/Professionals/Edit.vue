<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import ProfessionalForm from '@/Components/ProfessionalForm.vue';
    import {onMounted, reactive} from 'vue';
    import axios from 'axios';
    import { Inertia } from '@inertiajs/inertia'
    import { useForm } from '@inertiajs/inertia-vue3'

    const props = defineProps(['professional']);
    const form = useForm({name: '', crm: '', phone: '', specialities: []});

    onMounted(() => {
        if(props.professional) {
            const professional = props.professional;
            form.name = professional.name;
            form.crm = professional.crm;
            form.phone = professional.phone;
            form.specialities = professional.specialities;
        }
    });

    async function submit() {
        await form.put(
            route('professional.update', {professional: props.professional.id}), 
            {
                preserveScroll: true
            }
        );
    }

    Inertia.on('error', (errors) => {
        console.log("Global error event", errors);
    });
</script>
<template>
    <Head title="Alterar Médico" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Médicos > Editar
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="post" @submit.prevent="submit">
                            <ProfessionalForm v-model="form" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>