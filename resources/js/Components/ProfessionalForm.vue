<script setup>
import Label from '@/Components/Label.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import MultipleDropdown from '@/Components/MultipleDropdown.vue';
import Button from '@/Components/Button.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import { ref, onMounted, reactive, watch } from 'vue';

const props = defineProps(['modelValue']);
const emit = defineEmits(['update:modelValue']);

const state = reactive({name: '', crm: '', phone: '', specialities: [], availableSpecialities: []});

onMounted(() => {
    if(props.modelValue) {
        state.name = props.modelValue.name;
        state.crm = props.modelValue.crm;
        state.phone = props.modelValue.phone;
        state.specialities = props.modelValue.specialities;
    }

    fetch('/api/specialities').then(async response => {
        var list = await response.json();
        state.availableSpecialities = list;
    });
});

watch(state, (newValue, oldValue) => {
    emit('update:modelValue', {name: newValue.name, crm: newValue.crm, phone: newValue.phone, specialities: newValue.specialities});
});

</script>
<template>
    <div class="flex items-start justify-between">
        <div class="flex-initial">
            <Label value="Nome" />
            <Input v-model="state.name" />
        </div>
        <div class="flex-initial">
            <Label value="CRM" />
            <Input v-model="state.crm" />
        </div>
        <div class="flex-initial">
            <Label value="Telefone" />
            <Input v-model="state.phone" />
        </div>
        <div class="flex-initial">
            <Label value="Especialidades" />
            <MultipleDropdown v-model="state.specialities" :options="state.availableSpecialities" placeholder="(selecione)" />
        </div>
    </div>
    <dic class="flex justify-end mt-10">
        <Button type="submit">
            Salvar
        </Button>
    </dic>
</template>