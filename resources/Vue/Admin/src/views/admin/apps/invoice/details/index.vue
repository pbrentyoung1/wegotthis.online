<template>
  <PageBreadcrumb title="Invoice Details" subtitle="Apps" />

  <div class="mx-auto w-full lg:w-10/12">
    <div class="grid grid-cols-1 gap-base lg:grid-cols-4">
      <div class="col-span-1 lg:col-span-3">
        <div class="card">
          <div class="card-body px-7.5">
            <div class="mb-5 flex items-center justify-between border-b border-default-300 pb-5">
              <a href="#" class="logo-dark">
                <img :src="logoBlack" class="flex h-6.5 dark:hidden print:flex" />
                <img :src="logo" class="hidden h-6.5 dark:flex print:hidden" />
              </a>

              <div class="text-end">
                <span class="badge mb-2.5 bg-warning/15 px-3 py-1.5 text-xs text-warning"> Pending </span>
                <h4 class="text-lg font-bold text-dark">Invoice #INS-0120001</h4>
              </div>
            </div>

            <div class="grid grid-cols-1 gap-2.5 md:grid-cols-3">
              <div>
                <h6 class="mb-2.5 text-2xs text-default-400 uppercase">From</h6>
                <p class="mb-1.25 font-semibold">Alina Thompson</p>
                <p class="mb-1.25 text-default-400">
                  88 Crescent Ave,<br />
                  Boston, MA - 02125
                </p>
                <p class="text-default-400">Phone: 617-452-0099</p>

                <div class="mt-7.5">
                  <h6 class="mb-2 text-2xs text-default-400 uppercase">Invoice Date</h6>
                  <p class="font-medium">20 Apr 2025</p>
                </div>
              </div>

              <div>
                <h6 class="mb-2.5 text-2xs text-default-400 uppercase">To</h6>
                <p class="mb-1.25 font-semibold">Daniel Moore</p>
                <p class="mb-1.25 text-default-400">
                  790 Westwood Blvd,<br />
                  Los Angeles, CA - 90024
                </p>
                <p class="text-default-400">Phone: 310-555-1022</p>

                <div class="mt-7.5">
                  <h6 class="mb-2 text-2xs text-default-400 uppercase">Due Date</h6>
                  <p class="font-medium">05 May 2025</p>
                </div>
              </div>

              <div class="flex justify-end">
                <img :src="qr" class="size-20" style="max-height: 80px" />
              </div>
            </div>

            <div class="table-wrapper mt-7.5 mb-4">
              <table class="table-bordered table text-center align-middle text-sm">
                <thead class="thead-sm bg-light/25 text-xs uppercase">
                  <tr>
                    <th class="w-12">#</th>
                    <th>Product Details</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-end">Total</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>01</td>
                    <td class="text-start">
                      <strong class="block font-medium">Figma Design System</strong>
                      <div class="text-2xs text-default-400">(Desktop & Mobile UI Kit)</div>
                    </td>
                    <td>1</td>
                    <td>$350.00</td>
                    <td class="text-end">$350.00</td>
                  </tr>

                  <tr>
                    <td>02</td>
                    <td class="text-start">
                      <strong class="block font-medium">Node.js API Development</strong>
                      <div class="text-2xs text-default-400">(User auth, dashboard APIs)</div>
                    </td>
                    <td>12</td>
                    <td>$50.00</td>
                    <td class="text-end">$600.00</td>
                  </tr>

                  <tr>
                    <td>03</td>
                    <td class="text-start">
                      <strong class="block font-medium">Admin UI Setup</strong>
                      <div class="text-2xs text-default-400">(Homepage, blog layout)</div>
                    </td>
                    <td>1</td>
                    <td>$220.00</td>
                    <td class="text-end">$220.00</td>
                  </tr>

                  <tr>
                    <td>04</td>
                    <td class="text-start">
                      <strong class="block font-medium">Firebase Setup</strong>
                      <div class="text-2xs text-default-400">(Hosting & config)</div>
                    </td>
                    <td>1</td>
                    <td>$100.00</td>
                    <td class="text-end">$100.00</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="mb-4 flex justify-end">
              <table class="table-borderless table text-end text-sm">
                <tbody>
                  <tr>
                    <td class="font-medium">Subtotal</td>
                    <td>$1,270.00</td>
                  </tr>
                  <tr>
                    <td class="font-medium">Shipping</td>
                    <td>Free</td>
                  </tr>
                  <tr>
                    <td class="font-medium">Discount (5%)</td>
                    <td class="text-danger">- $63.50</td>
                  </tr>
                  <tr>
                    <td class="font-medium">Tax (7%)</td>
                    <td>$84.42</td>
                  </tr>
                  <tr>
                    <td class="border-t border-default-300">Total</td>
                    <td class="border-t border-default-300">$1,290.92</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="mt-3 rounded bg-light/50 px-6 py-3 lg:mt-7.5">
              <p class="text-default-400">
                <strong>Note:</strong>
                Please make payment within 10 days. For any billing inquiries, contact
                <a href="mailto:billing@alinadesignco.com" class="font-medium text-primary"> billing@alinadesignco.com </a>.
              </p>
            </div>

            <div class="mt-7.5">
              <p class="mb-5 font-semibold">Thank you for your business!</p>
              <img :src="sign" class="h-10.5" />
              <p class="mb-4 text-2xs text-default-400 italic">Authorized Signature</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-span-1">
        <div class="sticky top-25">
          <div class="card">
            <div class="card-body">
              <div class="flex flex-col gap-2.5">
                <button class="btn bg-light hover:text-primary"><Icon icon="pencil" /> Edit</button>

                <button class="btn bg-primary text-white hover:bg-primary-hover"><Icon icon="printer" /> Print</button>

                <button class="btn bg-info text-white hover:bg-info-hover"><Icon icon="download" /> Download</button>

                <button class="btn btn-lg bg-danger text-lg text-white hover:bg-danger-hover"><Icon icon="send-2" /> Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import logoBlack from '/images/logo-black.png'
import logo from '/images/logo.png'
import qr from '/images/qr.png'
import sign from '/images/sign.png'

import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
