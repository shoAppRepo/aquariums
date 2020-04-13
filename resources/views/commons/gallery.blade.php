<div id="app" class="container">
    <div class="row justify-content-center">
        <div>
          <div class="text-second mb-3" style="margin-top:50px;width:100vw">
            <h1>Gallery</h1>
          </div>
            <form
              class="form-inline justify-content-center"
              v-on:submit.prevent="fetchImagesFromFlickr"
             >
                <input
                  type="search" name="search"
                  class="form-control mr-sm-2"
                  placeholder="キーワードを入力"
                  aria-label="Search"
                >
                <button
                  type="submit"
                  class="btn btn-primary"
                  >
                    検索
                </button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <p 
          v-if="isInitalized"
          class="mt-4"
        >
            検索結果はこちらに表示されます。
        </p>
        <p
          v-show="isFetching"
          class="position-relative mx-auto"
        >
            <span
              class="loading-icon fas fa-sync"
              aria-hidden="true"
            >
            </span>
        </p>
        <p v-show="isFailed">
            データの取得に失敗しました。時間をおいてから再度検索してください。
        </p>
        <p v-show="isNotFound">
            写真が見つかりませんでした。
        </p>
        
        <template v-if="isFound">
            <a 
              v-for="photo in photos"
              v-bind:key="photo.id"
              v-bind:href="photo.pageURL"
              v-tooltip="photo.text"
              class="d-inline-block m-2"
              target="_blank"
            >
              <img
                v-bind:src="photo.imageURL"
                v-bind:alt="photo.text"
                width="150"
                height="150"
              >
            </a>
        </template>
    </div>
</div>