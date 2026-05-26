<template>
  <div class="xl:w-5/6 mx-auto">
    <div class="my-5 flex items-center justify-between">
      <div class="grow">
        <h4 class="page-main-title mb-1.25">Manage Teams</h4>
        <p class="text-default-400">Assign roles to streamline teamwork and secure access.</p>
      </div>

      <div class="text-end">
        <a href="#addTeamModal" class="btn bg-success text-white hover:bg-success-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="addTeamModal" data-hs-overlay="#addTeamModal"> <Icon icon="plus" /> Add New Team </a>
      </div>
    </div>

    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
      <TeamCard v-for="(team, index) in teamData" :key="index" :team="team" :index="index" />
    </div>
  </div>
  <div id="addTeamModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="addTeamModalLabel">
    <div class="hs-overlay-animation-target m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg hs-overlay-open:scale-100 hs-overlay-open:opacity-100">
      <div class="card pointer-events-auto flex w-full flex-col">
        <div class="card-header p-5 flex justify-between items-center">
          <h3 id="addTeamModalLabel" class="font-semibold">Add New Team</h3>

          <button type="button" aria-label="Close" data-hs-overlay="#addTeamModal">
            <Icon icon="x" class="align-middle text-2xl text-default-600" />
          </button>
        </div>

        <div class="card-body">
          <div class="mb-5">
            <label class="form-label">Team Name</label>
            <input type="text" class="form-input" placeholder="e.g., Creative Design Team" required />
          </div>

          <div class="mb-5">
            <label class="form-label">Team Code</label>
            <input type="text" class="form-input" placeholder="e.g., IT-01" required />
          </div>

          <div class="mb-5">
            <label class="form-label">Status</label>
            <select class="form-select">
              <option value="New" selected>New</option>
              <option value="Active">Active</option>
              <option value="Ongoing">Ongoing</option>
              <option value="Busy">Busy</option>
              <option value="Stable">Stable</option>
            </select>
          </div>

          <div class="mb-5">
            <label class="form-label">Team Members</label>
            <select class="form-select" multiple>
              <option value="1">Liam Carter</option>
              <option value="2">Ava Mitchell</option>
              <option value="3">Noah Parker</option>
              <option value="4">Emma Scott</option>
              <option value="5">Logan Brooks</option>
              <option value="6">Sophie Adams</option>
              <option value="7">Ethan Hall</option>
            </select>

            <div class="mt-1 text-2xs text-default-400">Hold Ctrl (Windows) or Cmd (Mac) to select multiple users.</div>
          </div>

          <div>
            <label class="form-label">Description</label>
            <textarea class="form-textarea" rows="3" placeholder="Brief team responsibilities..." />
          </div>
        </div>

        <div class="flex items-center justify-end gap-2 border-t border-default-300 p-5">
          <button type="button" class="btn bg-light hover:text-primary" data-hs-overlay="#addTeamModal">Cancel</button>

          <button type="button" class="btn bg-success text-white hover:bg-success-hover">
            <Icon icon="check" />
            Save Team
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import TeamCard from './components/TeamCard.vue'
import { teamData } from './components/data'
</script>
