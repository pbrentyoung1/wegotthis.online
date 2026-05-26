<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Input Group</h4>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Username</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <span class="input-group-text">&#64;</span>
                <input type="text" placeholder="Username" class="form-input" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Amount</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" class="form-input" />
                <span class="input-group-text">.00</span>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Textarea</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <span class="input-group-text">With textarea</span>
                <textarea rows="2" class="form-textarea"></textarea>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="mt-2 block font-semibold">Wrapping</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <span class="input-group-text">&#64;</span>
                <input type="text" placeholder="Username" class="form-input" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Input + Button</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <input type="text" placeholder="Recipient's username" class="form-input" />
                <button type="button" class="btn bg-dark text-white hover:bg-dark-hover">Button</button>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="formFileMultiple01" class="form-label mb-0! py-2">Multiple Files</label>
            </div>

            <div class="lg:col-span-2">
              <input type="file" name="file-input" id="formFileMultiple01" class="form-input" multiple />
            </div>
          </div>
        </div>

        <div>
          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Recipient</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <input type="text" placeholder="Recipient's username" class="form-input" />
                <span class="input-group-text">&#64;example.com</span>
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Email Login</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <input type="text" placeholder="Username" class="form-input" />
                <span class="input-group-text">&#64;</span>
                <input type="text" placeholder="Server" class="form-input" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Vanity URL</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <span class="input-group-text text-nowrap">https://example.com/users/</span>
                <input type="text" class="form-input" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="mt-2 block font-semibold">Dropdown + Input</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <div class="hs-dropdown relative inline-flex">
                  <button type="button" class="hs-dropdown-toggle btn rounded-e-none bg-primary text-white hover:bg-primary-hover" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    Dropdown
                    <Icon icon="chevron-down" class="text-base text-white" />
                  </button>

                  <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                    <div class="space-y-0.5">
                      <a class="dropdown-item" href="#!">Action</a>

                      <a class="dropdown-item active" href="#!">Another action</a>

                      <a class="dropdown-item" href="#!">Something else here</a>
                    </div>
                  </div>
                </div>
                <input type="text" class="form-input" />
              </div>
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label for="inputGroupFile04" class="form-label mb-0! py-2">File Input</label>
            </div>

            <div class="lg:col-span-2">
              <input type="file" name="file-input" id="inputGroupFile04" class="form-input" />
            </div>
          </div>

          <div class="my-5 border-t border-dashed border-default-300"></div>

          <div class="grid grid-cols-1 gap-1.5 lg:grid-cols-3 lg:gap-9">
            <div>
              <label class="form-label mb-0! py-2">Input Group Select</label>
            </div>

            <div class="lg:col-span-2">
              <div class="input-group">
                <span class="input-group-text">Options</span>
                <select class="form-input rounded-s-none!">
                  <option selected>Choose...</option>
                  <option>One</option>
                  <option>Two</option>
                  <option>Three</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Icon from '~/components/wrappers/Icon.vue'
</script>
