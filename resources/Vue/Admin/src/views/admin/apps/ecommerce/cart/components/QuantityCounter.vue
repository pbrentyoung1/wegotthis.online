<template>
  <div class="input-group max-w-32.5" data-touchspin>
    <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" @click="handleDecrease">
      <Icon icon="minus" />
    </button>
    <input type="text" class="form-input" max="800000" v-model="props.quantity" />
    <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" @click="handleIncrease">
      <Icon icon="plus" />
    </button>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'

type Props = {
  id: number
  quantity: number
  onChange: (id: number, newQuantity: number) => void
  min?: number
  max?: number
}

const props = withDefaults(defineProps<Props>(), {
  min: 1,
  max: 800000,
})

const emit = defineEmits(['update:quantity'])

const handleDecrease = () => {
  if (props.quantity > props.min) {
    emit('update:quantity', props.quantity - 1)
  }
}

const handleIncrease = () => {
  if (props.quantity < props.max) {
    emit('update:quantity', props.quantity + 1)
  }
}
</script>
