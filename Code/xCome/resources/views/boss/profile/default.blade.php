@extends('layouts.boss.profile')

@section('workplace-div')
    <div id="wp-wallets">
        <table id="wallets-table" cellpadding="10px" border="1px">
            <tbody>
            <tr class="wallet" onclick="address.hidden = false;address.innerHTML = 'wallet address: 381920831'">
                <td class="wallet-name">Sapphire</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>

            <tr class="wallet" onclick="address.hidden = false;address.innerHTML = 'wallet address: 38912'">
                <td class="wallet-name">Riall</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="address.hidden = false;address.innerHTML = 'wallet address: 481924'">
                <td class="wallet-name">Dollar</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="address.hidden = false;address.innerHTML = 'wallet address: 3718273918'">
                <td class="wallet-name">Euro</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            </tbody>
        </table>
        <div id="address" hidden>wallet address: </div>
    </div>
@stop


