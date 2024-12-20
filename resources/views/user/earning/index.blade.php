@extends('layout.default')

@section('breadcrumbs')
    <li class="breadcrumbV2">
        <a href="{{ route('users.show', ['user' => $user]) }}" class="breadcrumb__link">
            {{ $user->username }}
        </a>
    </li>
    <li class="breadcrumbV2">
        <a href="{{ route('users.earnings.index', ['user' => $user]) }}" class="breadcrumb__link">
            {{ __('bon.bonus') }} {{ __('bon.points') }}
        </a>
    </li>
    <li class="breadcrumb--active">
        {{ __('bon.earnings') }}
    </li>
@endsection

@section('nav-tabs')
    @include('user.buttons.user')
@endsection

@section('page', 'page__bonus--index')

@section('main')
    <section class="panelV2" x-data="toggle">
        <header class="panel__header">
            <h2 class="panel__heading">{{ __('bon.earnings') }}</h2>
            <div class="panel__actions">
                <label class="panel__action">
                    {{ __('bon.extended-stats') }}
                    <input type="checkbox" x-model="toggleState" />
                </label>
            </div>
        </header>
        <div class="data-table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>{{ __('common.name') }}</th>
                        <th>{{ __('common.description') }}</th>
                        <th>{{ __('common.points-per-unit') }}</th>
                        <th>{{ __('common.total-points') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('torrent.total-size') }}</td>
                        <td>{{ __('torrent.total-size-description') }}</td>
                        <td>0.1 {{ __('bon.points-per-gb') }}</td>
                        <td>{{ number_format($totalPoints, 2) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">{{ __('bon.total') }}</td>
                        <td>{{ number_format($totalPoints, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <section class="panelV2">
        <header class="panel__header">
            <h2 class="panel__heading">{{ __('bon.details') }}</h2>
        </header>
        <div class="panel__body">
            <dl class="key-value">
                <div class="key-value__group">
                    <dt>{{ __('torrent.total-size') }}</dt>
                    <dd>{{ number_format($totalSize, 2) }} GB</dd>
                </div>
                <div class="key-value__group">
                    <dt>{{ __('bon.total-points') }}</dt>
                    <dd>{{ number_format($totalPoints, 2) }} {{ __('bon.points') }}</dd>
                </div>
            </dl>
        </div>
    </section>
@endsection

@section('sidebar')
    <section class="panelV2">
        <h2 class="panel__heading">{{ __('bon.your-points') }}</h2>
        <div class="panel__body">{{ $user->formatted_seedbonus }}</div>
    </section>
    <section class="panelV2">
        <h2 class="panel__heading">{{ __('bon.summary') }}</h2>
        <dl class="key-value">
            <div class="key-value__group">
                <dt>{{ __('torrent.total-size') }}</dt>
                <dd>{{ number_format($totalSize, 2) }} GB</dd>
            </div>
            <div class="key-value__group">
                <dt>{{ __('bon.total-points') }}</dt>
                <dd>{{ number_format($totalPoints, 2) }} {{ __('bon.points') }}</dd>
            </div>
        </dl>
    </section>
@endsection



