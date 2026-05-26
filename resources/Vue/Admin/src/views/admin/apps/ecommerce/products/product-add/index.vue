<template>
  <PageBreadcrumb title="Add Product" subtitle="Ecommerce" />
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-base">
      <div class="space-y-base lg:col-span-2">
        <div class="card">
          <div class="card-header p-5">
            <div>
              <h4 class="card-title mb-1.25">Product Information</h4>
              <p class="text-default-400">To add a new product, please provide the necessary details in the fields below.</p>
            </div>
          </div>

          <div class="card-body">
            <div class="grid md:grid-cols-2 gap-base">
              <div class="col-span-2">
                <label for="productName" class="form-label">
                  Product Name
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-input" id="productName" placeholder="Enter product name" />
              </div>

              <div class="col-span-2 md:col-span-1">
                <label for="skuId" class="form-label">
                  SKU
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-input" id="skuId" placeholder="SOFA-10058" />
              </div>

              <div class="col-span-2 md:col-span-1">
                <label for="stockNumber" class="form-label">
                  Stock
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-input" id="stockNumber" placeholder="250" />
              </div>

              <div class="col-span-2">
                <label class="form-label">
                  Product Description
                  <span class="text-default-400">(Optional)</span>
                </label>

                
                  <QuillEditor style="height: 140px" v-model:content="value" content-type="html" :options="{ toolbar: [['bold', 'italic', 'underline', 'strike', 'blockquote', 'code-block', { list: 'ordered' }, 'link', 'image']] }" theme="snow" />
                
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-5">
            <div>
              <h4 class="card-title mb-1.25">Product Image</h4>
              <p class="text-default-400">To upload a product image, please use the option below to select and upload the relevant file.</p>
            </div>
          </div>

          <div class="card-body">
            <FileUploader title="Drop files here or click to upload." subtitle="You can drag images here, or browse files via the button below." />
          </div>
        </div>
      </div>

      <div class="space-y-base">
        <div class="card">
          <div class="card-header p-5">
            <div>
              <h4 class="card-title mb-1.25">Pricing</h4>
              <p class="text-default-400">Set the base price and applicable discount for the product using the options below.</p>
            </div>
          </div>

          <div class="card-body">
            <div class="space-y-base">
              <div>
                <label for="basePrice" class="form-label"> Base Price <span class="text-danger">*</span></label>
                <div class="input-icon-group">
                  <Icon icon="currency-dollar" class="input-icon" />
                  <input type="text" class="form-input" id="basePrice" placeholder="Enter base price (e.g., 199.99)" />
                </div>
              </div>

              <div>
                <label for="discount" class="form-label">
                  Discount Type
                  <span class="text-default-400">(Optional)</span>
                </label>
                <div class="input-icon-group">
                  <Icon icon="discount" class="input-icon" />
                  <select class="form-select" id="discount">
                    <option>Choose Discount</option>
                    <option value="No Discount">No Discount</option>
                    <option value="Flat Discount">Flat Discount</option>
                    <option value="Percentage Discount">Percentage Discount</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="discountValue" class="form-label"> Discount Value <span class="text-default-400">(Optional)</span></label>
                <div class="input-icon-group">
                  <Icon icon="tag" class="input-icon" />
                  <input type="text" class="form-input" id="discountValue" placeholder="Enter discount amount or percentage" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-5">
            <div>
              <h4 class="card-title mb-1.25">Organize</h4>
              <p class="text-default-400">Organize your product by selecting the appropriate brand, category, sub-category, status, and tags.</p>
            </div>
          </div>

          <div class="card-body">
            <div class="space-y-base">
              <div>
                <label for="brand" class="form-label">Brand</label>
                <div class="input-icon-group">
                  <Icon icon="stack-2" class="input-icon" />
                  <input type="text" class="form-input" id="brand" placeholder="Enter brand name" />
                </div>
              </div>

              <div>
                <label for="category" class="form-label">Category <span class="text-danger ms-1">*</span></label>
                <div class="input-icon-group">
                  <Icon icon="category" class="input-icon" />
                  <select class="form-select" id="category">
                    <option>Choose Category</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Fashion">Fashion</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="subCategory" class="form-label">Sub Category<span class="text-danger ms-1">*</span></label>
                <div class="input-icon-group">
                  <Icon icon="list-check" class="input-icon" />
                  <select class="form-select" id="subCategory">
                    <option>Choose Sub Category</option>
                    <option value="Chairs">Chairs</option>
                    <option value="Sofas">Sofas</option>
                    <option value="Tables">Tables</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="statusOne" class="form-label">
                  Status
                  <span class="text-danger ms-1">*</span>
                </label>
                <div class="input-icon-group">
                  <Icon icon="wand" class="input-icon" />
                  <select class="form-select" id="statusOne">
                    <option>Choose Status</option>
                    <option value="Published">Published</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Schedule">Schedule</option>
                    <option value="Draft">Draft</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="tags" class="form-label">Tags</label>
                <div class="input-icon-group">
                  <Icon icon="tag" class="input-icon" />
                  <input type="text" class="form-input" id="tags" placeholder="Enter tags separated by commas" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-7.5 mb-2.5 flex justify-center gap-2.5">
      <RouterLink to="" class="btn bg-danger text-white hover:bg-danger-hover">Discard</RouterLink>
      <RouterLink to="" class="btn bg-secondary text-white hover:bg-secondary-hover">Save as Draft</RouterLink>
      <RouterLink to="" class="btn bg-success text-white hover:bg-success-hover">Publish</RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { ref } from 'vue'
import FileUploader from '~/components/FileUploader.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'

const value = ref(
  `<p>Introducing the <strong><em>Azure Comfort Single Sofa</em></strong>, a perfect blend of modern design and luxurious comfort.</p><p>This premium blue single sofa is designed to elevate any living space with its sleek profile and rich, durable fabric. It’s the perfect seating option for your living room, lounge area, or cozy reading nook.</p><ul><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Crafted with a solid mahogany frame for enhanced durability.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Upholstered in a high-quality blue fabric that offers both style and comfort.</li></ul>`
)
</script>
