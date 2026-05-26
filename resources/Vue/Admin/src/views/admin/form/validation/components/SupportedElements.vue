<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Supported Elements</h4>
    </div>
    <div class="card-body">
      <form class="space-y-6" novalidate>
        <div>
          <label for="validationTextarea" class="form-label">Textarea</label>
          <textarea id="validationTextarea" placeholder="Required example textarea" required class="form-textarea border-danger!"></textarea>
          <p class="text-danger mt-1 text-2xs">Please enter a message in the textarea.</p>
        </div>

        <div class="flex items-start gap-2">
          <input id="validationFormCheck1" type="checkbox" required class="form-checkbox checked:bg-danger! border-danger! mt-0.5" />
          <div>
            <label for="validationFormCheck1" class="text-danger">Check this checkbox</label>
            <p class="text-danger mt-1 text-2xs">Example invalid feedback text</p>
          </div>
        </div>

        <div class="space-y-2">
          <div class="flex items-center gap-2">
            <input id="validationFormCheck2" type="radio" name="radio-stacked" required class="form-radio checked:bg-danger! border-danger!" />
            <label for="validationFormCheck2" class="text-danger">Toggle this radio</label>
          </div>

          <div class="flex items-center gap-2">
            <input id="validationFormCheck3" type="radio" name="radio-stacked" required class="form-radio checked:bg-danger! border-danger!" />
            <label for="validationFormCheck3" class="text-danger">Or toggle this other radio</label>
            <p class="text-danger mt-1 text-2xs">More example invalid feedback text</p>
          </div>
        </div>

        <div>
          <select required class="form-input border-success!">
            <option value="">Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>

        <div>
          <input type="file" required class="form-input block w-full text-sm" />
          <p class="text-danger mt-1 text-2xs">Example invalid form file feedback</p>
        </div>

        <div>
          <button type="submit" disabled class="btn bg-primary hover:bg-primary-hover cursor-not-allowed text-white">Submit form</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts"></script>

<style></style>
