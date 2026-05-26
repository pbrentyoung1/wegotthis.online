<template>
  <div class="card">
    <div class="card-header block items-start p-7.5 md:flex">
      <div>
        <h3 class="mb-1.25 flex items-center text-lg">Order #WB20100</h3>

        <p class="text-default-400 mb-5 flex gap-1 items-center">
          <Icon icon="calendar" class="align-middle"></Icon>
          24 Apr, 2025
          <small class="text-default-400">10:10 AM</small>
        </p>

        <div class="flex items-center gap-1">
          <span class="badge badge-label text-2xs font-semibold bg-success/15 text-success"> <Icon icon="circle-filled" class="text-sm" /> Paid </span>

          <span class="badge badge-label text-2xs font-semibold bg-info/15 text-info"> <Icon icon="truck" class="text-sm" /> Shipped </span>
        </div>
      </div>

      <div class="mt-4 md:ms-auto md:mt-0">
        <RouterLink to="" class="btn bg-light hover:text-primary me-1"> <Icon icon="pencil" class="text-sm" /> Modify </RouterLink>
        <RouterLink to="" class="btn bg-danger text-white hover:bg-danger-hover"> <Icon icon="trash" class="text-sm" /> Delete </RouterLink>
      </div>
    </div>

    <div class="card-body px-7.5!">
      <h4 class="mb-5">Order Summary</h4>
      <div class="table-wrapper">
        <table class="table table-bordered">
          <thead class="thead-sm text-2xs uppercase bg-light/25">
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>QTY</th>
              <th class="text-end">Total</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>
                <div class="flex items-start gap-base">
                  <img :src="product1" alt="Wireless Earbuds" class="size-9 rounded-md" />
                  <div>
                    <h5 class="text-default-800 font-medium mb-1.25">
                      <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary"> Wireless Earbuds</RouterLink>
                    </h5>
                    <p class="text-default-400 text-2xs">by: My Furniture</p>
                  </div>
                </div>
              </td>
              <td>$79.99</td>
              <td>2</td>
              <td class="text-end font-medium">$159.98</td>
            </tr>

            <tr>
              <td>
                <div class="flex items-start gap-base">
                  <img :src="product2" alt="Smart Watch" class="size-9 rounded-md" />
                  <div>
                    <h5 class="text-default-800 font-medium mb-1.25">
                      <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary"> Smart Watch</RouterLink>
                    </h5>
                    <p class="text-default-400 text-2xs">by: Tech World</p>
                  </div>
                </div>
              </td>
              <td>$199.00</td>
              <td>1</td>
              <td class="text-end font-medium">$199.00</td>
            </tr>

            <tr>
              <td>
                <div class="flex items-start gap-base">
                  <img :src="product3" alt="Gaming Mouse" class="size-9 rounded-md" />
                  <div>
                    <h5 class="text-default-800 font-medium mb-1.25">
                      <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary"> Gaming Mouse</RouterLink>
                    </h5>
                    <p class="text-default-400 text-2xs">by: Pro Gamerz</p>
                  </div>
                </div>
              </td>
              <td>$49.50</td>
              <td>3</td>
              <td class="text-end font-medium">$148.50</td>
            </tr>

            <tr class="border-default-300 border-t">
              <td colspan="3" class="text-default-800 px-4 py-3 text-right font-medium">Subtotal</td>
              <td class="text-end">$507.48</td>
            </tr>

            <tr>
              <td colspan="3" class="text-default-800 px-4 py-3 text-right font-medium">Tax (10%)</td>
              <td class="text-end">$50.75</td>
            </tr>

            <tr>
              <td colspan="3" class="text-default-800 px-4 py-3 text-right font-medium">Discount (5%)</td>
              <td class="text-danger px-4 py-3 text-right font-semibold">- $25.37</td>
            </tr>

            <tr>
              <td colspan="3" class="text-default-800 px-4 py-3 text-right font-medium">Shipping Fee</td>
              <td class="text-end">$10.00</td>
            </tr>

            <tr class="border-default-300 border-t">
              <td colspan="3" class="text-end font-bold uppercase">Grand Total</td>
              <td class="text-end font-bold bg-default-50">$543.86</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import product1 from '/images/products/1.png'
import product2 from '/images/products/2.png'
import product3 from '/images/products/3.png'
</script>
