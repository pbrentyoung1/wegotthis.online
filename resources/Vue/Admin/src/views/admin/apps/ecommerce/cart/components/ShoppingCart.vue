<template>
  <div class="card">
    <div class="card-header flex justify-between">
      <h4 class="card-title">Shopping Cart</h4>
      <a href="#" class="text-primary font-medium underline underline-offset-4">Clear cart</a>
    </div>

    <div class="card-body">
      <div class="table-wrapper">
        <table class="table min-w-full border-collapse">
          <thead class="thead-sm bg-light/25 text-2xs uppercase">
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="item in cartItems" :key="item.id">
              <td class="flex items-center gap-base">
                <img :src="item.image" alt="iPhone" class="size-15 rounded" />
                <div>
                  <span v-if="item.discount" class="badge bg-danger/15 text-danger mb-1.25">-10%</span>
                  <h6 class="mb-1.25">{{ item.title }}</h6>
                  <small class="text-default-400 block">Color: {{ item.color }}</small>
                  <small class="text-default-400 block">Model: {{ item.model }}</small>
                </div>
              </td>
              <td>
                <template v-if="item.discount">
                  <span class="font-semibold">${{ item.price.toFixed(2) }}</span>
                  <br />
                  <small class="text-default-400 line-through">${{ (item.price / (1 - item.discount / 100)).toFixed(2) }}</small>
                </template>
                <template v-else> ${{ item.price.toFixed(2) }} </template>
              </td>
              <td v-if="item.quantity !== undefined">
                <QuantityCounter :id="item.id" v-model:quantity="item.quantity" @change="handleQuantityChange" />
              </td>
              <td class="font-semibold">${{ (item.price * item.quantity).toFixed(2) }}</td>
              <td>
                <RouterLink to="" class="text-default-400" @click.prevent="handleRemove(item.id)">
                  <Icon icon="x" class="text-base" />
                </RouterLink>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="border-default-300 border-t pt-7.5">
        <RouterLink to="/apps/ecommerce/products-grid" class="text-primary inline-flex items-center gap-1.5 font-medium">
          <Icon icon="arrow-left" />
          Continue Shopping
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import QuantityCounter from './QuantityCounter.vue'
import { cartItemData, type CartItemType } from './data'

const cartItems = ref<CartItemType[]>(cartItemData)

const handleQuantityChange = (id: number, newQuantity: number) => {
  cartItems.value = cartItems.value.map((item) => (item.id === id ? { ...item, quantity: newQuantity } : item))
}

const handleRemove = (id: number) => {
  cartItems.value = cartItems.value.filter((item) => item.id !== id)
}
</script>
