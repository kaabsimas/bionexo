<script setup>
    import { useForm } from '@inertiajs/inertia-vue3'
    import Button from '@/Components/Button.vue';
    import { Inertia } from '@inertiajs/inertia'

    const props = defineProps({professional: {}});

    const form = useForm({id: props.professional.id});

    function deleteProfessional() {
        form.delete(route('professional.destroy', {professional: form.id}), {
            preserveState: false,
            onFinish: () => Inertia.reload({preserveState:false}),
            onBefore: () => confirm("Está certo que deseja remover este médico?")
        });
    }
</script>

<template>
    <div class="p-6 w-full mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
        <div class="shrink-0 mr-10">
            <img class="h-12 w-12" src="https://www.gravatar.com/avatar?d=retro" alt="ChitChat Logo">
        </div>
        <div class="w-1/3">
            <div class="text-xl font-medium text-black">{{ professional.name }}</div>
            <p class="text-slate-500"><strong>CRM: </strong> {{ professional.crm }}</p>
            <p class="text-slate-500"><strong>Telefone: </strong> {{ professional.phone }}</p>
        </div>
        <div class="flex w-full justify-end">
            <input type="hidden" v-model="form.id">
            <Button type="button" class="mr-5">Editar</Button> 
            <Button type="button" @click="deleteProfessional()" class="bg-red-800 hover:bg-red-700 active:bg-red-900" >Remover</Button>
        </div>
    </div>
</template>