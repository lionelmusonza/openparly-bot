<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Authy\V1\Service\Entity;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class FactorOptions {
    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @param string $authorization The Authorization HTTP request header
     * @return CreateFactorOptions Options builder
     */
    public static function create(string $twilioAuthySandboxMode = Values::NONE, string $authorization = Values::NONE): CreateFactorOptions {
        return new CreateFactorOptions($twilioAuthySandboxMode, $authorization);
    }

    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return DeleteFactorOptions Options builder
     */
    public static function delete(string $twilioAuthySandboxMode = Values::NONE): DeleteFactorOptions {
        return new DeleteFactorOptions($twilioAuthySandboxMode);
    }

    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return FetchFactorOptions Options builder
     */
    public static function fetch(string $twilioAuthySandboxMode = Values::NONE): FetchFactorOptions {
        return new FetchFactorOptions($twilioAuthySandboxMode);
    }

    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return ReadFactorOptions Options builder
     */
    public static function read(string $twilioAuthySandboxMode = Values::NONE): ReadFactorOptions {
        return new ReadFactorOptions($twilioAuthySandboxMode);
    }

    /**
     * @param string $authPayload Optional payload to verify the Factor for the
     *                            first time
     * @param string $friendlyName The friendly name of this Factor
     * @param string $config The config for this Factor as a json string
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return UpdateFactorOptions Options builder
     */
    public static function update(string $authPayload = Values::NONE, string $friendlyName = Values::NONE, string $config = Values::NONE, string $twilioAuthySandboxMode = Values::NONE): UpdateFactorOptions {
        return new UpdateFactorOptions($authPayload, $friendlyName, $config, $twilioAuthySandboxMode);
    }
}

class CreateFactorOptions extends Options {
    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @param string $authorization The Authorization HTTP request header
     */
    public function __construct(string $twilioAuthySandboxMode = Values::NONE, string $authorization = Values::NONE) {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
        $this->options['authorization'] = $authorization;
    }

    /**
     * The Twilio-Authy-Sandbox-Mode HTTP request header
     *
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return $this Fluent Builder
     */
    public function setTwilioAuthySandboxMode(string $twilioAuthySandboxMode): self {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
        return $this;
    }

    /**
     * The Authorization HTTP request header
     *
     * @param string $authorization The Authorization HTTP request header
     * @return $this Fluent Builder
     */
    public function setAuthorization(string $authorization): self {
        $this->options['authorization'] = $authorization;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Authy.V1.CreateFactorOptions ' . $options . ']';
    }
}

class DeleteFactorOptions extends Options {
    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     */
    public function __construct(string $twilioAuthySandboxMode = Values::NONE) {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
    }

    /**
     * The Twilio-Authy-Sandbox-Mode HTTP request header
     *
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return $this Fluent Builder
     */
    public function setTwilioAuthySandboxMode(string $twilioAuthySandboxMode): self {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Authy.V1.DeleteFactorOptions ' . $options . ']';
    }
}

class FetchFactorOptions extends Options {
    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     */
    public function __construct(string $twilioAuthySandboxMode = Values::NONE) {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
    }

    /**
     * The Twilio-Authy-Sandbox-Mode HTTP request header
     *
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return $this Fluent Builder
     */
    public function setTwilioAuthySandboxMode(string $twilioAuthySandboxMode): self {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Authy.V1.FetchFactorOptions ' . $options . ']';
    }
}

class ReadFactorOptions extends Options {
    /**
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     */
    public function __construct(string $twilioAuthySandboxMode = Values::NONE) {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
    }

    /**
     * The Twilio-Authy-Sandbox-Mode HTTP request header
     *
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return $this Fluent Builder
     */
    public function setTwilioAuthySandboxMode(string $twilioAuthySandboxMode): self {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Authy.V1.ReadFactorOptions ' . $options . ']';
    }
}

class UpdateFactorOptions extends Options {
    /**
     * @param string $authPayload Optional payload to verify the Factor for the
     *                            first time
     * @param string $friendlyName The friendly name of this Factor
     * @param string $config The config for this Factor as a json string
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     */
    public function __construct(string $authPayload = Values::NONE, string $friendlyName = Values::NONE, string $config = Values::NONE, string $twilioAuthySandboxMode = Values::NONE) {
        $this->options['authPayload'] = $authPayload;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['config'] = $config;
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
    }

    /**
     * The optional payload needed to verify the Factor for the first time. E.g. for a TOTP, the numeric code.
     *
     * @param string $authPayload Optional payload to verify the Factor for the
     *                            first time
     * @return $this Fluent Builder
     */
    public function setAuthPayload(string $authPayload): self {
        $this->options['authPayload'] = $authPayload;
        return $this;
    }

    /**
     * The new friendly name of this Factor
     *
     * @param string $friendlyName The friendly name of this Factor
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The new config for this Factor. It must be a json string with the required properties for the given factor type
     *
     * @param string $config The config for this Factor as a json string
     * @return $this Fluent Builder
     */
    public function setConfig(string $config): self {
        $this->options['config'] = $config;
        return $this;
    }

    /**
     * The Twilio-Authy-Sandbox-Mode HTTP request header
     *
     * @param string $twilioAuthySandboxMode The Twilio-Authy-Sandbox-Mode HTTP
     *                                       request header
     * @return $this Fluent Builder
     */
    public function setTwilioAuthySandboxMode(string $twilioAuthySandboxMode): self {
        $this->options['twilioAuthySandboxMode'] = $twilioAuthySandboxMode;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Authy.V1.UpdateFactorOptions ' . $options . ']';
    }
}