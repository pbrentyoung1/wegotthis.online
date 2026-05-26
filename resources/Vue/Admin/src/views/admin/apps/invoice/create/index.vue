<template>
  <PageBreadcrumb title="Create Invoice" subtitle="Apps" />

  <div class="mx-auto w-full lg:w-10/12">
    <div class="grid grid-cols-1 gap-base lg:grid-cols-4">
      <div class="col-span-1 lg:col-span-3">
        <div class="card">
          <div class="card-body p-7.5">
            <div class="mb-7.5 flex flex-wrap items-center justify-between gap-4">
              <div class="relative flex h-15 w-65 items-center justify-between rounded border border-default-300 px-2 text-center">
                <label for="invoiceLogo" class="absolute inset-0 flex cursor-pointer items-center justify-between px-2">
                  <img :src="logoBlack" class="flex h-7 dark:hidden print:flex" alt="dark logo" />
                  <img :src="logo" class="hidden h-7 dark:flex print:hidden" alt="dark logo" />
                  <Icon icon="cloud-upload" class="text-xl text-default-400"></Icon>
                </label>
                <input type="file" id="invoiceLogo" accept="image/*" class="hidden" />
              </div>

              <div class="text-end">
                <div class="flex flex-wrap items-center gap-2.5">
                  <div class="flex flex-col">
                    <label for="invoiceNumber" class="form-label">Invoice #</label>
                    <input type="text" id="invoiceNumber" class="form-input w-40" placeholder="e.g. INV-0001" />
                  </div>

                  <div class="flex flex-col">
                    <label for="currency" class="form-label">Currency</label>
                    <select id="currency" class="form-select">
                      <option value="USD" selected>USD ($)</option>
                      <option value="EUR">EUR (€)</option>
                      <option value="GBP">GBP (£)</option>
                      <option value="INR">INR (₹)</option>
                      <option value="JPY">JPY (¥)</option>
                      <option value="AUD">AUD (A$)</option>
                      <option value="CAD">CAD (C$)</option>
                      <option value="CNY">CNY (¥)</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 gap-base md:grid-cols-3">
              <div>
                <label for="invoiceDate" class="form-label">Invoice Date</label>
                <FlatPickr :config="{ dateFormat: 'Y-m-d' }" v-model="invoiceDate" type="text" id="invoiceDate" class="flatpickr-input form-input bg-transparent!" />
              </div>

              <div>
                <label for="dueDate" class="form-label">Due Date</label>
                <FlatPickr :config="{ dateFormat: 'Y-m-d' }" v-model="dueDate" type="text" id="dueDate" class="flatpickr-input form-input bg-transparent!" />
              </div>

              <div>
                <label for="paymentMethod" class="form-label">Payment Method</label>
                <select id="paymentMethod" class="form-input">
                  <option value="">Select</option>
                  <option>Credit / Debit Card</option>
                  <option>Bank Transfer</option>
                  <option>PayPal</option>
                  <option>UPI (GPay)</option>
                  <option>Cash</option>
                </select>
              </div>
            </div>

            <div class="mt-7.5">
              <div class="grid grid-cols-1 gap-base md:grid-cols-2">
                <div>
                  <label class="form-label">Billing Address</label>
                  <input type="text" class="mb-3 form-input" placeholder="Name" />
                  <textarea rows="3" class="mb-3 form-textarea" placeholder="Address"></textarea>
                  <div class="input-group flex">
                    <select class="form-select" style="max-width: 120px">
                      <option value="+1">+1 (US)</option>
                      <option value="+44" selected>+44 (UK)</option>
                      <option value="+91">+91 (IN)</option>
                      <option value="+61">+61 (AU)</option>
                      <option value="+971">+971 (UAE)</option>
                    </select>
                    <input type="text" class="form-input" placeholder="Phone Number" />
                  </div>
                </div>

                <div>
                  <label class="form-label">Shipping Address</label>
                  <input type="text" class="mb-3 form-input" placeholder="Name" />
                  <textarea rows="3" class="mb-3 form-textarea" placeholder="Address"></textarea>

                  <div class="input-group flex">
                    <select class="form-select" style="max-width: 120px">
                      <option value="+1">+1 (US)</option>
                      <option value="+44" selected>+44 (UK)</option>
                      <option value="+91">+91 (IN)</option>
                      <option value="+61">+61 (AU)</option>
                      <option value="+971">+971 (UAE)</option>
                    </select>
                    <input type="text" class="form-input" placeholder="Phone Number" />
                  </div>
                </div>
              </div>
            </div>

            <div class="table-wrapper mt-7.5">
              <table class="mb-4 table min-w-full text-center align-middle">
                <thead class="bg-light/25 text-2xs tracking-wider uppercase">
                  <tr>
                    <th class="p-2">#</th>
                    <th class="p-2 text-left">Item Description</th>
                    <th class="p-2">Qty</th>
                    <th class="p-2">Unit Price</th>
                    <th class="p-2">Amount</th>
                    <th class="p-2">Action</th>
                  </tr>
                </thead>

                <tbody id="invoice-items">
                  <tr>
                    <td class="px-2.25 py-3">1</td>
                    <td class="px-2.25 py-3">
                      <input type="text" class="form-input" placeholder="Description" />
                    </td>
                    <td class="px-2.25 py-3">
                      <input type="number" class="form-input" placeholder="1" />
                    </td>
                    <td class="px-2.25 py-3">
                      <input type="number" class="form-input" placeholder="0.00" />
                    </td>
                    <td class="px-2.25 py-3">
                      <input type="number" class="form-input" placeholder="0.00" />
                    </td>
                    <td class="px-2.25 py-3">
                      <button type="button" class="btn btn-icon size-7.5 bg-danger text-white hover:bg-danger-hover">×</button>
                    </td>
                  </tr>
                </tbody>
              </table>

              <button type="button" class="btn mt-3 bg-primary text-white hover:bg-primary-hover">
                <Icon icon="plus"></Icon>
                Add Item
              </button>
            </div>

            <div class="mt-7.5 flex justify-end">
              <div class="md:w-1/3">
                <div class="table-wrapper">
                  <table class="table-borderless table">
                    <tbody>
                      <tr>
                        <td class="text-end">Subtotal</td>
                        <td>
                          <input type="number" id="subtotal" placeholder="0.00" class="form-input" />
                        </td>
                      </tr>
                      <tr>
                        <td class="text-end">Tax (%)</td>
                        <td>
                          <input type="number" id="tax" placeholder="0.00" class="form-input" />
                        </td>
                      </tr>
                      <tr>
                        <td class="text-end">Discount</td>
                        <td>
                          <input type="number" id="discount" placeholder="0.00" class="form-input" />
                        </td>
                      </tr>
                      <tr class="font-bold">
                        <td class="text-end">Total</td>
                        <td>
                          <input type="number" id="total" placeholder="0.00" readonly class="form-input bg-transparent!" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="mt-7.5">
              <label for="invoiceNote" class="form-label">Additional Notes</label>
              <textarea id="invoiceNote" class="form-textarea" rows="3" placeholder="e.g. Thank you for your business!"></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="col-span-1">
        <div class="sticky top-25">
          <div class="card">
            <div class="card-body">
              <div class="flex flex-col justify-center gap-2.5">
                <RouterLink to="" class="btn bg-light hover:text-primary"> <Icon icon="eye"></Icon> Preview </RouterLink>

                <RouterLink to="" class="btn bg-light hover:text-primary"> <Icon icon="download"></Icon> Download </RouterLink>

                <RouterLink to="" class="btn btn-lg bg-danger text-white hover:bg-danger-hover"> <Icon icon="send-2"></Icon> Send </RouterLink>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import logoBlack from '/images/logo-black.png'
import logo from '/images/logo.png'

const invoiceDate = ref('today')
const dueDate = ref('today')
</script>
