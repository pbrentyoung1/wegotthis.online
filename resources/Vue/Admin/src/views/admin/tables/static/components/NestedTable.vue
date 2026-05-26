<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Nesting</h4>
    </div>

    <div class="card-body">
      <div class="table-wrapper">
        <table class="table">
          <thead class="font-semibold text-xs">
            <tr>
              <th>Product Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Rating</th>
              <th>Status</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="font-medium">Bluetooth Speaker</td>
              <td>Audio</td>
              <td>$49.00</td>
              <td>200</td>
              <td>4.6 ★</td>
              <td>
                <span class="badge badge-label bg-success/10 text-success">Active</span>
              </td>
              <td class="text-end">
                <div class="hs-dropdown relative inline-flex">
                  <button type="button" class="hs-dropdown-toggle flex h-7.5 w-11.25 items-center justify-center font-semibold" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" hs-dropdown-placement="bottom-end">
                    <Icon icon="dots-vertical" class="text-xl"></Icon>
                  </button>
                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div>
                      <a class="dropdown-item" href="#">
                        <Icon icon="eye" class="text-xs"></Icon>
                        Overview
                      </a>
                      <a class="dropdown-item" href="#">
                        <Icon icon="edit" class="text-xs"></Icon>
                        Edit
                      </a>
                      <a class="dropdown-item text-danger" href="#">
                        <Icon icon="trash" class="text-xs"></Icon>
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <td colspan="7" class="border-default-300 w-full border-b p-5">
                <table class="table">
                  <thead class="font-semibold text-xs">
                    <tr>
                      <th>Variant</th>
                      <th>Color</th>
                      <th>SKU</th>
                      <th>Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="p-2 font-medium">Mini</td>
                      <td class="p-2">Black</td>
                      <td class="p-2">SPK-M-BLK</td>
                      <td class="p-2">80</td>
                    </tr>

                    <tr>
                      <td class="p-2 font-medium">Standard</td>
                      <td class="p-2">Blue</td>
                      <td class="p-2">SPK-S-BLU</td>
                      <td class="p-2">120</td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>

            <tr>
              <td class="font-medium">Leather Wallet</td>
              <td>Accessories</td>
              <td>$29.99</td>
              <td>150</td>
              <td>4.3 ★</td>
              <td>
                <span class="badge badge-label bg-success/10 text-success">Active</span>
              </td>
              <td class="text-end">
                <div class="hs-dropdown relative inline-flex">
                  <button type="button" class="hs-dropdown-toggle flex h-7.5 w-11.25 items-center justify-center font-semibold" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" hs-dropdown-placement="bottom-end">
                    <Icon icon="dots-vertical" class="text-xl"></Icon>
                  </button>
                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div>
                      <a class="dropdown-item" href="#">
                        <Icon icon="eye" class="text-xs"></Icon>
                        Overview
                      </a>
                      <a class="dropdown-item" href="#">
                        <Icon icon="edit" class="text-xs"></Icon>
                        Edit
                      </a>
                      <a class="dropdown-item text-danger" href="#">
                        <Icon icon="trash" class="text-xs"></Icon>
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <td class="font-medium">Fitness Tracker</td>
              <td>Wearables</td>
              <td>$89.00</td>
              <td>60</td>
              <td>4.1 ★</td>
              <td>
                <span class="badge badge-label bg-warning/10 text-warning">Limited Stock</span>
              </td>
              <td class="text-end">
                <div class="hs-dropdown relative inline-flex">
                  <button type="button" class="hs-dropdown-toggle flex h-7.5 w-11.25 items-center justify-center font-semibold" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" hs-dropdown-placement="bottom-end">
                    <Icon icon="dots-vertical" class="text-xl"></Icon>
                  </button>
                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div>
                      <a class="dropdown-item" href="#">
                        <Icon icon="eye" class="text-xs"></Icon>
                        Overview
                      </a>
                      <a class="dropdown-item" href="#">
                        <Icon icon="edit" class="text-xs"></Icon>
                        Edit
                      </a>
                      <a class="dropdown-item text-danger" href="#">
                        <Icon icon="trash" class="text-xs"></Icon>
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
</script>
