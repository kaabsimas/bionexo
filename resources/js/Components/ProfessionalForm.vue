<script setup>
import Label from '@/Components/Label.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import MultipleDropdown from '@/Components/MultipleDropdown.vue';
import Button from '@/Components/Button.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import { ref, onMounted, reactive, watch } from 'vue';

const props = defineProps(['modelValue', 'errors']);
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

function getErrorMessageFor(input) {
    if(!props.errors)
        return '';

    switch (input) {
        case 'name':
            if(props.errors.hasOwnProperty('name') && props.errors.name.length > 0){
                return props.errors.name[0];
            }
            break;
        case 'crm':
            if(props.errors.hasOwnProperty('crm') && props.errors.crm.length > 0){
                return props.errors.crm[0];
            }
            break;
        case 'phone':
            if(props.errors.hasOwnProperty('phone') && props.errors.phone.length > 0){
                return props.errors.phone[0];
            }
            break;
        case 'specialities':
            if(props.errors.hasOwnProperty('specialities') && props.errors.specialities.length > 0){
                return props.errors.specialities[0];
            }
            break;
        default:
            return '';
    }
}

</script>
<template>
    <div class="flex items-start justify-between">
        <div class="flex-initial">
            <Label value="Nome" />
            <Input name="name" v-model="state.name" type="text" />
            <InputError :message="getErrorMessageFor('name')" />
        </div>
        <div class="flex-initial">
            <Label value="CRM" />
            <Input name="document" v-model="state.crm" type="text" />
            <InputError :message="getErrorMessageFor('crm')" />
        </div>
        <div class="flex-initial">
            <Label value="Telefone" />
            <Input name="phone" v-model="state.phone" type="text" />
            <InputError :message="getErrorMessageFor('phone')" />
        </div>
        <div class="flex-initial">
            <Label value="Especialidades" />
            <InputError :message="getErrorMessageFor('specialities')" />
            <MultipleDropdown v-model="state.specialities" :options="state.availableSpecialities" placeholder="(selecione)" />
        </div>
    </div>
    <dic class="flex justify-end mt-10">
        <Button type="submit">
            Salvar
        </Button>
    </dic>
</template>