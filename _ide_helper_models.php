<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property int $stok
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Part newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part query()
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereStok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUpdatedAt($value)
 */
	class Part extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $part_id
 * @property string $kode_transaksi
 * @property int $qty
 * @property string $tipe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Part $part
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi whereKodeTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi whereTipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartMutasi whereUpdatedAt($value)
 */
	class PartMutasi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $partin_h_id
 * @property int $part_id
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Part $part
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD wherePartinHId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinD whereUpdatedAt($value)
 */
	class PartinD extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $operator
 * @property string $tanggal
 * @property string|null $pengirim
 * @property string|null $penerima
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PartinD> $details
 * @property-read int|null $details_count
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH whereOperator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH wherePenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH wherePengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartinH whereUpdatedAt($value)
 */
	class PartinH extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $partout_h_id
 * @property int $part_id
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Part $part
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD wherePartoutHId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutD whereUpdatedAt($value)
 */
	class PartoutD extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $operator
 * @property string $tanggal
 * @property string|null $pengirim
 * @property string|null $penerima
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PartoutD> $details
 * @property-read int|null $details_count
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH whereOperator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH wherePenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH wherePengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartoutH whereUpdatedAt($value)
 */
	class PartoutH extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $is_admin
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

