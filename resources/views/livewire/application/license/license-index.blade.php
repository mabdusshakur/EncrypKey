<div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>License</th>
                            <th>Status</th>
                            <th>HWID</th>
                            <th>IP</th>
                            <th>MAC</th>
                            <th>Expires At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($licenses as $license)
                            <tr>
                                <td>{{ $license->license_key }}</td>
                                <td>{{ $license->is_used ? 'Used' : 'Un-Used' }}</td>
                                <td>{{ $license->hwid_hash }}</td>
                                <td>{{ $license->ip_address }}</td>
                                <td>{{ $license->mac_address }}</td>
                                <td>
                                    @if (strtotime($license->expires_at) < time())
                                        Expired
                                    @else
                                        {{ $license->expires_at }}
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="deleteLicense({{ $license->id }})">Delete</button>
                                    @if ($license->is_banned)
                                        <button class="btn btn-sm btn-success"
                                            wire:click="unbanLicense({{ $license->id }})">Unban</button>
                                    @else
                                        <button class="btn btn-sm btn-warning"
                                            wire:click="banLicense({{ $license->id }})">Ban</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
