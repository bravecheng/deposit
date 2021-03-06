<?php


abstract class BaseDepositMembersFavoritesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'deposit_members_favorites';

	
	const CLASS_DEFAULT = 'lib.model.DepositMembersFavorites';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'deposit_members_favorites.ID';

	
	const DEPOSIT_MEMBERS_ID = 'deposit_members_favorites.DEPOSIT_MEMBERS_ID';

	
	const DEPOSIT_FINANCIAL_PRODUCTS_ID = 'deposit_members_favorites.DEPOSIT_FINANCIAL_PRODUCTS_ID';

	
	const SYNC_STATUS = 'deposit_members_favorites.SYNC_STATUS';

	
	const UUID = 'deposit_members_favorites.UUID';

	
	const CREATED_AT = 'deposit_members_favorites.CREATED_AT';

	
	const UPDATED_AT = 'deposit_members_favorites.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DepositMembersId', 'DepositFinancialProductsId', 'SyncStatus', 'Uuid', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (DepositMembersFavoritesPeer::ID, DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, DepositMembersFavoritesPeer::SYNC_STATUS, DepositMembersFavoritesPeer::UUID, DepositMembersFavoritesPeer::CREATED_AT, DepositMembersFavoritesPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'deposit_members_id', 'deposit_financial_products_id', 'sync_status', 'uuid', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DepositMembersId' => 1, 'DepositFinancialProductsId' => 2, 'SyncStatus' => 3, 'Uuid' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (DepositMembersFavoritesPeer::ID => 0, DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID => 1, DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID => 2, DepositMembersFavoritesPeer::SYNC_STATUS => 3, DepositMembersFavoritesPeer::UUID => 4, DepositMembersFavoritesPeer::CREATED_AT => 5, DepositMembersFavoritesPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'deposit_members_id' => 1, 'deposit_financial_products_id' => 2, 'sync_status' => 3, 'uuid' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DepositMembersFavoritesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DepositMembersFavoritesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DepositMembersFavoritesPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(DepositMembersFavoritesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DepositMembersFavoritesPeer::ID);

		$criteria->addSelectColumn(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID);

		$criteria->addSelectColumn(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID);

		$criteria->addSelectColumn(DepositMembersFavoritesPeer::SYNC_STATUS);

		$criteria->addSelectColumn(DepositMembersFavoritesPeer::UUID);

		$criteria->addSelectColumn(DepositMembersFavoritesPeer::CREATED_AT);

		$criteria->addSelectColumn(DepositMembersFavoritesPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(deposit_members_favorites.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT deposit_members_favorites.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DepositMembersFavoritesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = DepositMembersFavoritesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DepositMembersFavoritesPeer::populateObjects(DepositMembersFavoritesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DepositMembersFavoritesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DepositMembersFavoritesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDepositMembers(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, DepositMembersPeer::ID);

		$rs = DepositMembersFavoritesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDepositFinancialProducts(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, DepositFinancialProductsPeer::ID);

		$rs = DepositMembersFavoritesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDepositMembers(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DepositMembersFavoritesPeer::addSelectColumns($c);
		$startcol = (DepositMembersFavoritesPeer::NUM_COLUMNS - DepositMembersFavoritesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DepositMembersPeer::addSelectColumns($c);

		$c->addJoin(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, DepositMembersPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DepositMembersFavoritesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepositMembersPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDepositMembers(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDepositMembersFavorites($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDepositMembersFavoritess();
				$obj2->addDepositMembersFavorites($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDepositFinancialProducts(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DepositMembersFavoritesPeer::addSelectColumns($c);
		$startcol = (DepositMembersFavoritesPeer::NUM_COLUMNS - DepositMembersFavoritesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DepositFinancialProductsPeer::addSelectColumns($c);

		$c->addJoin(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, DepositFinancialProductsPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DepositMembersFavoritesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepositFinancialProductsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDepositFinancialProducts(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDepositMembersFavorites($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDepositMembersFavoritess();
				$obj2->addDepositMembersFavorites($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, DepositMembersPeer::ID);

		$criteria->addJoin(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, DepositFinancialProductsPeer::ID);

		$rs = DepositMembersFavoritesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DepositMembersFavoritesPeer::addSelectColumns($c);
		$startcol2 = (DepositMembersFavoritesPeer::NUM_COLUMNS - DepositMembersFavoritesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepositMembersPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepositMembersPeer::NUM_COLUMNS;

		DepositFinancialProductsPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DepositFinancialProductsPeer::NUM_COLUMNS;

		$c->addJoin(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, DepositMembersPeer::ID);

		$c->addJoin(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, DepositFinancialProductsPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DepositMembersFavoritesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = DepositMembersPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDepositMembers(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDepositMembersFavorites($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initDepositMembersFavoritess();
				$obj2->addDepositMembersFavorites($obj1);
			}


					
			$omClass = DepositFinancialProductsPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDepositFinancialProducts(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDepositMembersFavorites($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initDepositMembersFavoritess();
				$obj3->addDepositMembersFavorites($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptDepositMembers(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, DepositFinancialProductsPeer::ID);

		$rs = DepositMembersFavoritesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDepositFinancialProducts(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DepositMembersFavoritesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, DepositMembersPeer::ID);

		$rs = DepositMembersFavoritesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptDepositMembers(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DepositMembersFavoritesPeer::addSelectColumns($c);
		$startcol2 = (DepositMembersFavoritesPeer::NUM_COLUMNS - DepositMembersFavoritesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepositFinancialProductsPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepositFinancialProductsPeer::NUM_COLUMNS;

		$c->addJoin(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, DepositFinancialProductsPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DepositMembersFavoritesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepositFinancialProductsPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDepositFinancialProducts(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDepositMembersFavorites($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDepositMembersFavoritess();
				$obj2->addDepositMembersFavorites($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDepositFinancialProducts(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DepositMembersFavoritesPeer::addSelectColumns($c);
		$startcol2 = (DepositMembersFavoritesPeer::NUM_COLUMNS - DepositMembersFavoritesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepositMembersPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepositMembersPeer::NUM_COLUMNS;

		$c->addJoin(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, DepositMembersPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DepositMembersFavoritesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepositMembersPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDepositMembers(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDepositMembersFavorites($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDepositMembersFavoritess();
				$obj2->addDepositMembersFavorites($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DepositMembersFavoritesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DepositMembersFavoritesPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DepositMembersFavoritesPeer::ID);
			$selectCriteria->add(DepositMembersFavoritesPeer::ID, $criteria->remove(DepositMembersFavoritesPeer::ID), $comparison);

			$comparison = $criteria->getComparison(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID);
			$selectCriteria->add(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, $criteria->remove(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID), $comparison);

			$comparison = $criteria->getComparison(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID);
			$selectCriteria->add(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, $criteria->remove(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(DepositMembersFavoritesPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(DepositMembersFavoritesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof DepositMembersFavorites) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
				$vals[2][] = $value[2];
			}

			$criteria->add(DepositMembersFavoritesPeer::ID, $vals[0], Criteria::IN);
			$criteria->add(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, $vals[1], Criteria::IN);
			$criteria->add(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, $vals[2], Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(DepositMembersFavorites $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DepositMembersFavoritesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DepositMembersFavoritesPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(DepositMembersFavoritesPeer::DATABASE_NAME, DepositMembersFavoritesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DepositMembersFavoritesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $id, $deposit_members_id, $deposit_financial_products_id, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(DepositMembersFavoritesPeer::ID, $id);
		$criteria->add(DepositMembersFavoritesPeer::DEPOSIT_MEMBERS_ID, $deposit_members_id);
		$criteria->add(DepositMembersFavoritesPeer::DEPOSIT_FINANCIAL_PRODUCTS_ID, $deposit_financial_products_id);
		$v = DepositMembersFavoritesPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseDepositMembersFavoritesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DepositMembersFavoritesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DepositMembersFavoritesMapBuilder');
}
