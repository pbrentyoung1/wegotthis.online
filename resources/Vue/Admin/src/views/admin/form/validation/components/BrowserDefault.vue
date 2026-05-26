<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Browser Defaults</h4>
    </div>
    <div class="card-body">
      <form action="">
        <div class="grid md:grid-cols-3 grid-cols-1 gap-base mb-base">
          <div>
            <label for="validationDefault01" class="form-label">First name</label>
            <input type="text" class="form-input" id="validationDefault01" value="Mark" required />
          </div>

          <div>
            <label for="validationDefault02" class="form-label">Last name</label>
            <input type="text" class="form-input" id="validationDefault02" value="Otto" required />
          </div>

          <div>
            <label for="validationDefaultUsername" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend2">&#64;</span>
              <input type="text" class="form-input" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required />
            </div>
          </div>
        </div>

        <div class="grid md:grid-cols-4 grid-cols-1 gap-base mb-base">
          <div class="md:col-span-2 col-span-1">
            <label for="validationDefault03" class="form-label">City</label>
            <input type="text" class="form-input" id="validationDefault03" required />
          </div>

          <div>
            <label for="validationDefault04" class="form-label">State</label>
            <select class="form-input" id="validationDefault04" required>
              <option selected disabled value="">Choose...</option>
              <option>...</option>
            </select>
          </div>

          <div>
            <label for="validationDefault05" class="form-label">Zip</label>
            <input type="text" class="form-input" id="validationDefault05" required />
          </div>
        </div>

        <div>
          <label class="flex items-center space-x-2">
            <input type="checkbox" id="invalidCheck2" required class="form-checkbox" />
            <span class="text-default-700">Agree to terms and conditions</span>
          </label>
        </div>

        <div class="mt-5">
          <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">Submit form</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts"></script>

<style></style>
