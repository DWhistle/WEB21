<?php


abstract class Weapon
{
	// use WeaponType;

	private $_charges;
	private $_coordinates;
	private $_orientation;
	private $_short_range;
	private $_middle_range;
	private $_long_range;
	private $_effect_zone;

	public abstract function isInRange($ship);

	/**
	 * @return mixed
	 */
	public function getCharges()
	{
		return $this->_charges;
	}

	/**
	 * @param mixed $base_charges
	 */
	public function setCharges($charges)
	{
		$this->_charges = $charges;
	}

	/**
	 * @return mixed
	 */
	public function getOrientation()
	{
		return $this->_orientation;
	}

	/**
	 * @param mixed $orientation
	 */
	public function setOrientation($orientation)
	{
		$this->_orientation = $orientation;
	}

	/**
	 * @return mixed
	 */
	public function getShortRange()
	{
		return $this->ShortRange;
	}

	/**
	 * @param mixed $ShortRange
	 */
	public function setShortRange($ShortRange)
	{
		$this->ShortRange = $ShortRange;
	}

	/**
	 * @return mixed
	 */
	public function getMiddleRange()
	{
		return $this->MiddleRange;
	}

	/**
	 * @param mixed $MiddleRange
	 */
	public function setMiddleRange($MiddleRange)
	{
		$this->MiddleRange = $MiddleRange;
	}

	/**
	 * @return mixed
	 */
	public function getLongRange()
	{
		return $this->LongRange;
	}

	/**
	 * @param mixed $LongRange
	 */
	public function setLongRange($LongRange)
	{
		$this->LongRange = $LongRange;
	}

	/**
	 * @return mixed
	 */
	public function getEffectZone()
	{
		return $this->EffectZone;
	}

	/**
	 * @param mixed $EffectZone
	 */
	public function setEffectZone($EffectZone)
	{
		$this->EffectZone = $EffectZone;
	}

}