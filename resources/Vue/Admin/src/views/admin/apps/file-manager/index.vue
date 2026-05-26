<template>
  <div>
    <PageBreadcrumb title="File Manager" subtitle="Apps" />
  </div>

  <div class="flex h-[calc(100vh-200px)]">
    <Sidebar />

    <div class="min-w-0 flex-1">
      <div class="card h-full">
        <div class="card-header">
          <div class="flex gap-2.5">
            <div class="flex items-center gap-2.5 text-start lg:hidden">
              <button class="btn btn-sm btn-icon border-default-300">
                <Icon icon="menu-4" class="size-6 text-default-600" aria-haspopup="dialog" aria-expanded="false" aria-controls="fileSidebaroffcanvas" aria-label="Toggle navigation" data-hs-overlay="#fileSidebaroffcanvas" />
              </button>
            </div>

            <div class="input-icon-group">
              <Icon icon="search" class="input-icon" />
              <input data-table-search type="search" placeholder="Search files..." class="form-input" />
            </div>
          </div>

          <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
            <span class="me-2.5 font-semibold text-nowrap">Filter By:</span>

            <div class="input-icon-group">
              <Icon icon="file" class="input-icon" />
              <select class="form-select">
                <option value="" selected>File Type</option>
                <option value="Folder">Folder</option>
                <option value="MySQL">MySQL</option>
                <option value="MP4">MP4</option>
                <option value="Audio">Audio</option>
                <option value="Figma">Figma</option>
              </select>
            </div>

            <div>
              <select class="form-select">
                <option value="5">5</option>
                <option value="8" selected>8</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
              </select>
            </div>
          </div>
        </div>

        <Simplebar class="card-body h-[calc(100%-100px)]" data-simplebar>
          <div class="mb-base grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-4">
            <FolderCard v-for="(folder, idx) in folderData" :key="idx" :folder="folder" />
          </div>

          <div class="table-wrapper">
            <table class="table-hover table">
              <thead class="thead-sm border-t border-default-200">
                <tr class="bg-light/25 text-2xs uppercase">
                  <th class="w-[1%]">
                    <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" id="checkAll" />
                  </th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Modified</th>
                  <th>Owner</th>
                  <th>Shared with</th>
                  <th class="text-end">Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr v-for="(item, idx) in fileRecordData.slice(0, 8)" :key="idx">
                  <td>
                    <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" value="option" />
                  </td>

                  <td>
                    <div class="flex items-center gap-2.5">
                      <div class="flex size-9 items-center justify-center rounded bg-light/50 text-default-400">
                        <Icon :icon="item.icon" class="text-xl" />
                      </div>
                      <div>
                        <h5 class="mb-1.25">
                          <a href="#" class="hover:text-primary">{{ item.name }}</a>
                        </h5>
                        <p class="text-xs text-default-400">{{ formatBytes(item.size) }}</p>
                      </div>
                    </div>
                  </td>

                  <td>{{ item.type }}</td>
                  <td>{{ item.modified }}</td>

                  <td>
                    <div class="flex items-center gap-2.5">
                      <img :src="item.image" alt="" class="size-6 rounded-full" />
                      <h5>
                        <a href="#" class="transition-all hover:text-primary"> john&#64;techgroup.com </a>
                      </h5>
                    </div>
                  </td>

                  <td>
                    <div class="flex items-center -space-x-2">
                      <img v-for="(shared, i) in item.sharedWith" :key="i" :src="shared.image" alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" />
                    </div>
                  </td>

                  <td>
                    <div class="flex items-center justify-end gap-3">
                      <!-- Star toggle -->
                      <div class="relative">
                        <span :id="`star-${idx}`"></span>

                        <button type="button" :data-hs-toggle-password="JSON.stringify({ target: `#star-${idx}` })">
                          <div class="hidden items-center gap-1 hs-password-active:flex">
                            <Icon icon="star-filled" class="text-base text-warning" />
                          </div>
                          <div class="flex items-center gap-1 hs-password-active:hidden">
                            <Icon icon="star-filled" class="text-base text-default-400" />
                          </div>
                        </button>
                      </div>

                      <!-- Dropdown -->
                      <div class="relative">
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                          <button type="button" class="hs-dropdown-toggle text-xl text-default-400" aria-haspopup="menu" aria-expanded="false">
                            <Icon icon="dots-vertical" class="text-xl" />
                          </button>

                          <div class="hs-dropdown-menu" role="menu">
                            <div class="space-y-0.5">
                              <a class="dropdown-item" href="#"> <Icon icon="share" /> Share </a>

                              <a class="dropdown-item" href="#"> <Icon icon="link" /> Get Sharable Link </a>

                              <a class="dropdown-item" href="/images/users/user-1.jpg" download> <Icon icon="download" /> Download </a>

                              <a class="dropdown-item" href="#"> <Icon icon="pin" /> Pin </a>

                              <a class="dropdown-item" href="#"> <Icon icon="edit" /> Edit </a>

                              <a class="dropdown-item" href="#"> <Icon icon="trash" /> Delete </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="flex items-center justify-center gap-2.5 p-5">
            <strong>Loading...</strong>
            <div class="inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent text-danger" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </Simplebar>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Simplebar from 'simplebar-vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { formatBytes } from '~/utils/helpers'
import type { FolderType } from './components/data'
import { fileRecordData } from './components/data'
import FolderCard from './components/FolderCard.vue'
import Sidebar from './components/Sidebar.vue'

const folderData: FolderType[] = [
  { name: 'Premium Multi', size: 2300000000 },
  { name: 'Material Design', size: 105300000 },
  { name: 'DashPro UI Kit', size: 512000000 },
  { name: 'VueStudio Pack', size: 880000000 },
  { name: 'Nextify Pro', size: 1100000000 },
  { name: 'Blazor Studio', size: 780000000 },
  { name: 'Angular Prime', size: 940000000 },
  { name: 'React Kit Pro', size: 1600000000 },
]
</script>

<style></style>
