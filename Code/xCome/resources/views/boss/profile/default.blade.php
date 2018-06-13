@extends('layouts.boss.profile')

@section('workplace-div')
    <div id="wp-wallets">
        <table id="wallets-table" cellpadding="10px">
            <tbody>
            <tr class="wallet" onclick="location.href = '#'">
                <td class="wallet-name">Sapphire</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>

            <tr class="wallet" onclick="location.href = '#'">
                <td class="wallet-name">Riall</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="location.href = '#'">
                <td class="wallet-name">Dollar</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            <tr class="wallet" onclick="location.href = '#'">
                <td class="wallet-name">Euro</td>
                <td class="rel-price">Real time price</td>
                <td class="diagram">Price diagram</td>
            </tr>
            </tbody>
        </table>
    </div>
    @stop

