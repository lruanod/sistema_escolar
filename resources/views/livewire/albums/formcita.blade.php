
            <!-- Name input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="cinombre" wire:model="cinombre" type="text" placeholder="escribe tu nombre completo..." />
                <label for="name">Nombre completo</label>
                @error('cinombre') <span class="text-warning">{{$message}}</span> @enderror
            </div>
            <!-- Name input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="cifecha" wire:model="cifecha" type="datetime-local" />
                <label for="name">Hora y fecha de la cita</label>
                @error('cifecha') <span class="text-warning">{{$message}}</span> @enderror
            </div>
            <!-- Email address input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="cicorreo" wire:model="cicorreo" type="email" placeholder="name@example.com"  />
                <label for="cicorreo">Correo electrónico</label>
                @error('cicorreo') <span class="text-warning">{{$message}}</span> @enderror
            </div>
            <!-- Phone number input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="cicel" wire:model="cicel" type="tel" placeholder="(502) 456-7890" />
                <label for="cicel">Numero telefónico</label>
                @error('cicel') <span class="text-warning">{{$message}}</span> @enderror
            </div>
            <!-- Message input-->
            <div class="form-floating mb-3">
                <textarea class="form-control" id="cidescripcion" wire:model="cidescripcion" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                <label for="cidescripcion">Mensaje asunto</label>
                @error('cidescripcion') <span class="text-warning">{{$message}}</span> @enderror
            </div>










