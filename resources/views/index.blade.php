<x-layout>
    <section class="p-6">
        <div class="mx-auto flex items-center justify-center">
            <div class="text-center">
                <h3 class="font-bold text-3xl">Create a Poll</h3>
                <p class="mb-4">
                    Complete the fields below to create your poll.
                </p>
                <form action="" method="post" class="space-y-4">
                    @csrf
                    <div class="w-96 text-start">
                        <label class="label-text" for="labelAndHelperText">Title</label>
                        <input type="text" placeholder="Type your question here" class="input"
                            id="labelAndHelperText" />
                    </div>
                    <div class="space-y-2">
                        <p class="label-text text-start" for="content-remove-for-copy-target">Answer
                            options</p>
                        <div id="wrapper-remove-for-copy-target" class="w-96 space-y-3">
                            <div class="text-start">
                                <div id="content-remove-for-copy-target" class="text-start flex items-end space-x-4">
                                    <input type="text" placeholder="Type option here" class="input"
                                        name="option[]" />
                                    <button class="btn btn-square btn-outline btn-error" aria-label="delete button"
                                        data-copy-markup-delete-item>
                                        <span class="icon-[tabler--x]"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button type="button"
                            data-copy-markup='{
                                "targetSelector": "#content-remove-for-copy-target",
                                "wrapperSelector": "#wrapper-remove-for-copy-target",
                                "limit": 999
                            }'
                            id="copy-content" class="btn btn-primary">
                            &plus;
                            Add another option
                        </button>
                    </div>
                    <hr class="opacity-25">
                    <h3 class="font-medium text-start">Settings</h3>
                    <div class="flex items-center justify-between gap-1">
                        <label class="label-text text-base" for="multipleOptions">Allow selection of multiple
                            options</label>
                        <input type="checkbox" name="multipleOptions" value="1" class="switch switch-primary"
                            id="multipleOptions" />
                    </div>
                    <div class="flex items-center justify-between gap-1">
                        <label class="label-text text-base" for="resultsVisiblity">Public results</label>
                        <input type="checkbox" name="resultsVisiblity" value="1" class="switch switch-primary"
                            id="resultsVisiblity" />
                    </div>
                    <hr class="opacity-25">
                    <button type="submit" class="w-full btn btn-primary">
                        Create poll
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
