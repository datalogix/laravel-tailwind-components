<?php

namespace Datalogix\TailwindComponents\Traits;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    /**
     * Set default and old value.
     *
     * @param  string  $name
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  mixed  $language
     * @return void
     */
    private function setValue($name, $bind = null, $default = null, $language = null)
    {
        if ($this->isWired()) {
            return;
        }

        if (! $language) {
            $default = $this->getBoundValue($bind, $name) ?: $default;

            return $this->value = old($name, $default);
        }

        if ($bind !== false) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }

        $this->value = old("{$name}.{$language}", $default);
    }
}
