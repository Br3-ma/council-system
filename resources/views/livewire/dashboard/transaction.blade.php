<main>
    @include('livewire.alerts.alerts')
    <div class="mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
      <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 flex items-center gap-2 font-bold text-black dark:text-white">
          <svg
                class="fill-current"
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g clip-path="url(#clip0_130_9756)">
                  <path
                    d="M15.7501 0.55835H2.2501C1.29385 0.55835 0.506348 1.34585 0.506348 2.3021V15.8021C0.506348 16.7584 1.29385 17.574 2.27822 17.574H15.7782C16.7345 17.574 17.5501 16.7865 17.5501 15.8021V2.3021C17.522 1.34585 16.7063 0.55835 15.7501 0.55835ZM6.69385 10.599V6.4646H11.3063V10.5709H6.69385V10.599ZM11.3063 11.8646V16.3083H6.69385V11.8646H11.3063ZM1.77197 6.4646H5.45635V10.5709H1.77197V6.4646ZM12.572 6.4646H16.2563V10.5709H12.572V6.4646ZM2.2501 1.82397H15.7501C16.0313 1.82397 16.2563 2.04897 16.2563 2.33022V5.2271H1.77197V2.3021C1.77197 2.02085 1.96885 1.82397 2.2501 1.82397ZM1.77197 15.8021V11.8646H5.45635V16.3083H2.2501C1.96885 16.3083 1.77197 16.0834 1.77197 15.8021ZM15.7501 16.3083H12.572V11.8646H16.2563V15.8021C16.2563 16.0834 16.0313 16.3083 15.7501 16.3083Z"
                    fill=""
                  />
                </g>
                <defs>
                  <clipPath id="clip0_130_9756">
                    <rect
                      width="18"
                      height="18"
                      fill="white"
                      transform="translate(0 0.052124)"
                    />
                  </clipPath>
                </defs>
              </svg>
          Collection Transactions
        </h2>
        <nav>
          <ol class="flex items-center gap-2">
            <li>
              <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
            </li>
            <li class="font-medium text-primary">Collections</li>
          </ol>
        </nav>
      </div>
    
      <div class="flex items-center justify-content-between">
        @can('import transactions')
        <form action="{{ route('bulk-upload') }}" class="items-start w-3/4 md:w-auto mr-4 mb-2" method="post" enctype="multipart/form-data">
          @csrf
          <div class="flex">
            <label for="file-input" class="flex items-center gap-2 btn-upload bg-blue-500 hover:bg-blue-700 text-primary font-bold py-1 px-2 rounded cursor-pointer">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
                  <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708z"/>
                </svg>
              </span>
              Choose Excel File
            </label>
            <input type="file" id="file-input" name="file" accept=".xlsx" required class="hidden">
            <div class="file-label text-danger mt-1" id="file-label"></div>
          </div>
          <button type="submit" class="mt-8 flex items-center gap-2 rounded bg-success py-2 px-3 font-medium text-white hover:bg-opacity-80">
            <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
              <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
              <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </svg>
          </span>Upload Excel
          </button>
        </form>
        @endcan

        
        <div class=" flex items-center justify-content-center gap-2 w-1/2">
          @can('export transactions')
          <a href="{{ route('export-transactions') }}" class="mt-8 flex items-center justify-content-end gap-2 rounded bg-secondary py-2 px-3 font-medium text-white hover:bg-opacity-80">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data" viewBox="0 0 16 16">
                <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
                <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z"/>
                <path d="M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 0-1 1v3a1 1 0 1 0 2 0V9a1 1 0 0 0-1-1"/>
              </svg>
            </span>
            Export 
          </a> 
          @endcan

          @can('generate report')
          <button onclick="openModal('reportSearchModal')" class="mt-8 flex items-center justify-content-end gap-2 rounded bg-primary py-2 px-3 font-medium text-white hover:bg-opacity-80">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data" viewBox="0 0 16 16">
                <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
                <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z"/>
                <path d="M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 0-1 1v3a1 1 0 1 0 2 0V9a1 1 0 0 0-1-1"/>
              </svg>
            </span>
            Report
          </button>
          @endcan

          
          <button onclick="deleteSelectedItems()" class="mt-8 flex items-center justify-content-end gap-2 rounded bg-danger py-2 px-3 font-medium text-white hover:bg-opacity-80">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
              </svg>
            </span>
            Delete
          </button>
          
        </div>
      </div>
    </div>
    

      <div class="flex flex-col gap-10 mt-2">
        <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
          <div class="max-w-full overflow-x-auto">
            <table id="main_transations" class="w-full table-auto">
              <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">

                  <th>
                    <input type="checkbox" id="selectAllCheckbox" onclick="toggleSelectAll()">
                  </th> 
                  <th class="min-w-[110px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                    Date
                  </th>
                  <th class="min-w-[90px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11"> 
                    TID
                  </th>
                  <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">
                    Amount
                  </th>
                  <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                    Revenue Stream
                  </th>
                  <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">
                    Machine ID
                  </th>
                  
                  <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                    Receipt No.
                  </th>                  
                  <th class="min-w-[80px] py-4 px-4 font-medium text-black dark:text-white">
                    By
                  </th>
                  <th class="py-4 px-4 font-medium text-black dark:text-white">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transactions as $t)
                <tr>
                  <th>
                    <input type="checkbox" id="{{ $t->id }}" name="items[]" value="{{ $t->id }}">
                  </th>                  
                  <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                    <p class="text-black text-sm dark:text-white">{{ (new DateTime($t->created_at))->format('F j, Y') }}</p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-12 dark:border-strokedark">
                    <p class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                        {{ $t->id }}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <h5 class="font-bold text-black fw-bold dark:text-white">
                      K {{ $t->total_amount }}
                    </h5>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full  bg-opacity-10 py-1 px-3 text-sm font-bold text-dark">
            
                    {{ $t->stream != null ? $t->stream->name.' ('.$t->stream->code.')' : '' }}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                      {{$t->machine_id ?? $t->terminal_id}}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <a href="#" class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success text-success':'bg-danger text-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium ">
                      {{ $t->receipt != null ? $t->receipt->receipt_number : '--' }}
                    </a>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <a href="#" class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium ">
                      {{ $t->created_by }}
                    </a>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    @can('delete transaction')
                    <div class="flex items-center space-x-3.5">
                      <a href="#" onclick="confirmDelete('{{ route('delete-single-transaction', $t->id) }}')" class="hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </a>
                    @endcan
                    <script>
                        function confirmDelete(url) {
                            if (window.confirm('Are you sure you want to delete this transaction?')) {
                                window.location.href = url;
                            }
                        }
                    </script>
                    
                      <a href="{{route('details', $t->id)}}" class="hover:text-primary">
                        <svg
                          class="fill-current"
                          width="18"
                          height="18"
                          viewBox="0 0 18 18"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                            fill=""
                          />
                          <path
                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                            fill=""
                          />
                        </svg>
                      </a>

                    </div>
                  </td>
                </tr>
                @empty
                    
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @include('livewire.partials.transactions.generator')
    <script>
      // JavaScript to display the selected file name
      document.getElementById('file-input').addEventListener('change', function() {
        const fileLabel = document.getElementById('file-label');
        const fileName = this.files[0].name;
        fileLabel.innerText = fileName;
      });

      function deleteSelectedItems() {
        // Fetch all selected checkboxes
        const checkboxes = document.querySelectorAll('input[name="items[]"]:checked');
        const selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value);
        console.log(selectedIds);
        if (selectedIds.length > 0) {
          // Send an AJAX request to the Laravel route with the selected IDs
          fetch('delete-transaction', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ ids: selectedIds }),
          })
          .then(response => {
            if (response.ok) {
              console.log('Items deleted successfully.');
              
              window.location.reload(true);
            } else {
              console.error('Failed to delete items.');
            }
          })
          .catch(error => console.error('Error:', error));
        } else {
          alert("No items selected for deletion.");
        }
      }
      
      function toggleSelectAll() {
        console.log('hello');
        const selectAllCheckbox = document.getElementById('selectAllCheckbox');
        const checkboxes = document.querySelectorAll('input[name="items[]"]');

        checkboxes.forEach(checkbox => {
          checkbox.checked = selectAllCheckbox.checked;
        });
      }
    </script>

</main>